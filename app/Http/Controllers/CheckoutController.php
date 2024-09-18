<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\SupplyChain;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Carts::where('customer_id', session('customer'))->where('status', false)->get();
        $customer = Customer::where('id', session('customer'))->first();
        // dd($customer);
        return view("customer.checkout", compact("carts", "customer"));
    }

    public function store(Request $request)
    {
        $countOrder = count(Order::all());
        $code = 'J' . Carbon::now()->format("YmdHis") . $countOrder;
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);

        $order = new Order();
        $order->code = $code;
        $order->customer_id = Auth::guard('customer')->id();
        $order->carts_id = json_encode($request->carts_id);
        $order->total_price = $request->total_price;
        $order->status = 'pending';
        $order->different_address_status = $request->different_address_status == 'y' ? true : false;
        $order->different_address = $request->different_address;
        $order->image = $imageName;
        $order->save();

        foreach ($request->carts_id as $value) {
            $cart = Carts::find($value);
            $cart->status = true;
            $cart->save();
        }

        return redirect()->route('confirm', $code);
    }

    public function confirm($code)
    {
        
        $order = Order::where('code', $code)->first();
        $carts = Carts::where('customer_id', session('customer'))->where('status', false)->get();
        return view('customer.confirm', compact('carts', 'order'));
    }

    public function history()
    {
        $orders = Order::where('customer_id', Auth::id())->get();
        $carts = Carts::where('customer_id', session('customer'))->where('status', false)->get();
        return view('customer.history', compact('carts', 'orders'));
    }

    public function admin_checkout()
{
    $orders = Order::orderBy('created_at', 'desc')->get();
    // dd($orders);
    return view('admin.order.index', compact('orders'));
}


    public function update_status_order(Request $request)
    {
        // dd($request);
        $order = Order::where('code', $request->code)->first();
        $order->status = $request->status;
        $order->save();

        if ($request->status == 'verify') {
            foreach (json_decode($order->carts_id) as $id) {
                $cart = Carts::find($id);

                $product = Product::find($cart->product_id);
                $order = Order::find($cart->product_id);

                $product->product_stock = $product->product_stock - $cart->quantity;
                $product->save();

                $supply_chain = new SupplyChain();
                $supply_chain->reference_code = $request->code;
                $supply_chain->product_id = $product->id;
                $supply_chain->quantity = $cart->quantity;
                $supply_chain->product_price = $product->product_price;
                $supply_chain->save();
            }
        }

        return back();
    }
}