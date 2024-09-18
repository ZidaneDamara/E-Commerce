<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.Supplier.index', compact("suppliers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $suppliers = new Supplier();
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->supplier_phone = $request->supplier_phone;
        $suppliers->supplier_address = $request->supplier_address;

        $suppliers->save();
        return redirect()->route('admin.supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}