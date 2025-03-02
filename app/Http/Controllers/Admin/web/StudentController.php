<?php

namespace App\Http\Controllers\Admin\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function signup(Request $request)
    {
        return view('registration');
    }

    public function dashboard(Request $request)
    {
        return view('student.dashboard');
    }

    public function profile(Request $request)
    {
        return view('student.profile');
    }

    public function index(Request $request)
    {
        $activeUsersCount = User::where('status', 'active')->count();
        $inactiveUsersCount = User::where('status', 'inactive')->count();
        return view('admin-auth.students', [
            'activeUsersCount' => $activeUsersCount,
            'inactiveUsersCount' => $inactiveUsersCount
        ]);
    }
}
