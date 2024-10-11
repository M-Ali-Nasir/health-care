<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //dashboard page
    public function dashboardView()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }
}
