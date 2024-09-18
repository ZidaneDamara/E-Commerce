<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class LoginCustomerController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $customer = Customer::where('email', $request->email)->first();
            Session::put('customer', $customer->id); 
            return redirect()->intended('/');
        }        

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function showRegistrationForm()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255|unique:customers,customer_name',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $customer = Customer::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::put('customer', $customer->id);

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Session::forget('customer');
        return redirect()->route('customer.login');
    }
}