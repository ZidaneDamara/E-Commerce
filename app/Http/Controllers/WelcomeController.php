<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->get();
        return view('customer.welcome', compact('products'));
    }
}