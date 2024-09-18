<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->kategori == null) {
            $products = Product::with('category')->orderBy('id', 'desc')->get();
        } else {
            $products = Product::where('category_id', $request->kategori)->with('category')->orderBy('id', 'desc')->get();
        }

        $categories = Category::all();
        $carts = Carts::where('customer_id', session('customer'))->where('status', false)->get();
        return view('customer.welcome', compact('products', 'categories', 'carts'));
    }
}
