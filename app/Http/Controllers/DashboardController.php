<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        return view('admin.index'); // Pastikan Anda memiliki view 'admin.dashboard'
    }
}