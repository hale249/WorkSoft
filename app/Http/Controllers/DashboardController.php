<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends ProtectedController
{
    public function index(Request $request)
    {
        return view('elements.dashboard.index');
    }
}
