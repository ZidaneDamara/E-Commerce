<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SupplyChain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->get();
        return view('admin.produk.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.produk.create', compact('categories'));
    }

    public function store(Request $ProductRequest)
    {
        $ProductRequest->validate([
            'product_name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'product_price' => 'required|numeric',
            'product_description' => 'nullable|string',
            'product_stock' => 'required|integer',
            'cover' => 'required|image',
            'photo' => 'nullable|array',
            'photo.*' => 'image',
        ]);

        $cover = $ProductRequest->file('cover');
        $coverName = time() . '_' . $cover->getClientOriginalName();
        $cover->move(public_path('img'), $coverName);

        $photoNames = [];
        if ($ProductRequest->hasFile('photo')) {
            foreach ($ProductRequest->file('photo') as $photo) {
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('img'), $photoName);
                $photoNames[] = $photoName;
            }
        }

        $productCode = $this->generateProductCode();

        $product = Product::create([
            'product_code' => $productCode,
            'product_name' => $ProductRequest->product_name,
            'category_id' => $ProductRequest->category_id,
            'product_price' => $ProductRequest->product_price,
            'product_description' => $ProductRequest->product_description,
            'product_stock' => $ProductRequest->product_stock,
            'cover' => $coverName,
            'photo' => json_encode($photoNames),
        ]);


        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    private function generateProductCode()
    {
        $latestProduct = Product::orderBy('id', 'desc')->first();
        if ($latestProduct) {
            $latestCode = substr($latestProduct->product_code, 3);
            $newCode = 'UNQ' . str_pad($latestCode + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newCode = 'UNQ001';
        }
        return $newCode;
    }

    public function show(Product $produk)
    {
        //
    }

    public function edit(Product $produk)
    {
        $categories = Category::all();
        return view('admin.produk.edit', compact('produk', 'categories'));
    }

    public function update(Request $ProductRequest, Product $produk)
    {
        // dd($ProductRequest);
        $ProductRequest->validate([
            'product_name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'product_price' => 'required|numeric',
            'product_description' => 'nullable|string',
            'product_stock' => 'required|integer',
        ]);

        if ($ProductRequest->hasFile('cover')) {
            $cover = $ProductRequest->file('cover');
            $coverName = time() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('img'), $coverName);

            if (File::exists(public_path('img/' . $produk->cover))) {
                File::delete(public_path('img/' . $produk->cover));
            }
        } else {
            $coverName = $produk->cover;
        }

        $photoNames = json_decode($produk->photo, true) ?? [];
        if ($ProductRequest->hasFile('photo')) {
            foreach ($ProductRequest->file('photo') as $photo) {
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('img'), $photoName);
                $photoNames[] = $photoName;
            }
        }

        $produk->update([
            'product_name' => $ProductRequest->product_name,
            'category_id' => $ProductRequest->category_id,
            'product_price' => $ProductRequest->product_price,
            'product_description' => $ProductRequest->product_description,
            'product_stock' => $ProductRequest->product_stock,
            'cover' => $coverName,
            'photo' => json_encode($photoNames),
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $produk)
    {
        if (File::exists(public_path('img/' . $produk->cover))) {
            File::delete(public_path('img/' . $produk->cover));
        }

        $photos = json_decode($produk->photo, true) ?? [];
        foreach ($photos as $photo) {
            if (File::exists(public_path('img/' . $photo))) {
                File::delete(public_path('img/' . $photo));
            }
        }

        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}