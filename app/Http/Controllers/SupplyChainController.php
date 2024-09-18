<?php

namespace App\Http\Controllers;

use App\Models\SupplyChain;
use Illuminate\Http\Request;

class SupplyChainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplyChains = SupplyChain::orderBy('created_at', 'desc')->get();
        return view("admin.supply-chain.index", compact('supplyChains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplyChain $SupplyChain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupplyChain $SupplyChain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplyChain $SupplyChain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplyChain $SupplyChain)
    {
        //
    }
}