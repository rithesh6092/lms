<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin-auth.login');
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => __('Email is required'),
            'password.required' => __('Password is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $admin = Admin::where('email', $request->email)->first();

        if ($admin) {
            if ($admin->status == 'active') {
                if (Hash::check($request->password, $admin->password)) {
                    if (Auth::guard('admin')->attempt($credential, $request->remember)) {
                        $notification = __('Logged in successfully.');
                        $notification = ['messege' => $notification, 'alert-type' => 'success'];

                        return redirect()->route('dashboard')->with($notification);
                    }
                } else {
                    $notification = __('Invalid Password');
                    $notification = ['messege' => $notification, 'alert-type' => 'danger'];

                    return redirect()->back()->with($notification);
                }
            } else {
                $notification = __('Inactive account');
                $notification = ['messege' => $notification, 'alert-type' => 'danger'];

                return redirect()->back()->with($notification);
            }
        } else {
            $notification = 'Invalid Email';
            $notification = ['messege' => $notification, 'alert-type' => 'danger'];

            return redirect()->back()->with($notification);
        }
    }
}
