<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Auth;
use App\Models\Carts;
use App\Models\Product;
use App\Models\CartsItems;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {  
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $product = Product::find($request->product_id);
 

        // Check if the product is already in the cart
        $cartItem = Carts::where('status', false)->where('product_id', $request->product_id)->where('customer_id', session('customer'))->first();
 
        if ($cartItem) { 
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else { 
            $cart = new Carts();
            $cart->product_id = $request->product_id;
            $cart->customer_id = session('customer');
            $cart->quantity = $request->quantity;
            $cart->status = false;
            $cart->save(); 
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $carts = Carts::where('customer_id', session('customer'))->where('status', false)->get(); 
 

        return view('customer.cart', [
            'carts' => $carts, 
        ]);
    }

    public function updateQuantity($id, $quantity)
    {
        $cartItem = Carts::find($id);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        return redirect()->route('cart.view');
    }

    public function removeFromCart($id)
    {
        $cartItem = Carts::find($id);
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->route('cart.view');
    }
}