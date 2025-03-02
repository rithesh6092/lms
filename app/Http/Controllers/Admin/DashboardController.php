<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // remove intended url from session
        $request->session()->forget('url');
        return view('admin-auth.dashboard');
    }
}
