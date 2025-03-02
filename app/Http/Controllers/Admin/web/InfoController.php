<?php

namespace App\Http\Controllers\Admin\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function aboutUs(Request $request)
    {
        return view('about-us');
    }

    public function testimonials(Request $request)
    {
        return view('testimonials');
    }

    public function careers(Request $request)
    {
        return view('careers');
    }

    public function contactUs(Request $request)
    {
        return view('contact');
    }

    public function enquireUs(Request $request)
    {
        return view('enquiry');
    }
}
