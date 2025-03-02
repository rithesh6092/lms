<?php

namespace App\Http\Controllers\Admin\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
    }
}
