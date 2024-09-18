<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SupplyChain;
use App\Models\Purchase;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::orderBy("created_at", "desc")->get();
        return view("admin.purchase.index", compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $reference_number = 'B' . Carbon::now()->format('ymdHis');

        return view("admin.purchase.create", compact('suppliers', 'products', 'reference_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchase = new Purchase();
        $purchase->reference_number = $request->reference_number;
        $purchase->date = $request->date;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->desc = $request->desc;
        $purchase->save();

        foreach ($request->product_id as $i => $product_id) {
            $supplyChain = new SupplyChain();
            $supplyChain->reference_code = $request->reference_number;
            $supplyChain->product_id = $product_id;
            $supplyChain->quantity = $request->qty[$i];
            $supplyChain->product_price = $request->purchase_price[$i];
            $supplyChain->save();

            $product = Product::find($product_id);
            if ($product) {
                $product->product_stock += $request->qty[$i]; // Menggunakan product_stock
                $product->product_price = $request->purchase_price[$i];
                $product->save();
            }
        }

        return redirect()->route('admin.purchase.show', ['purchase' => $request->reference_number])->with('success', 'Purchase completed successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $purchase = Purchase::where('reference_number', $code)->first();
        $supplyChains = SupplyChain::where('reference_code', $code)->get();
        return view("admin.purchase.detail", compact('purchase', 'supplyChains'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}