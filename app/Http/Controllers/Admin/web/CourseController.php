<?php

namespace App\Http\Controllers\Admin\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function coursesPage() 
    {
        return view('courses');
    }
}
