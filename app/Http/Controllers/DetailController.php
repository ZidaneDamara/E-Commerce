<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    public function show($id)
    {
        // Fetch the product by its ID
        $product = Product::findOrFail($id);
        $carts = Carts::where('customer_id', session('customer'))->where('status', false)->get(); 

        // Pass the product data to the view
        return view('customer.detail', compact('product', 'carts'));
    }
}