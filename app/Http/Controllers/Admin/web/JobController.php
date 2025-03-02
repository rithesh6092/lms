<?php

namespace App\Http\Controllers\Admin\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function jobInfo(Request $request)
    {
        return view('job-info');
    }
}
