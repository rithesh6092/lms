@extends('layouts.app')

@section('title', 'Login | Groviio')

@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
  <div class="authentication-inner py-4">
    <!-- Login Card -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <a href="#" class="app-brand-link gap-2">
            <span class="app-brand-text demo text-heading fw-bold">
              <img src="{{ asset('assets/img/logo/groviio.png') }}" alt="logo">
            </span>
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Welcome to Groviio! 👋</h4>

        <form id="formAuthentication" class="mb-3" data-url="{{ route('admin.dashboard') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email or Username</label>
            <input
              type="text"
              class="form-control @error('email') is-invalid @enderror"
              id="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="Enter your email or username"
              autofocus />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
              <a href="auth-forgot-password-basic.html">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password"
                placeholder="••••••••••••"
                aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
          </div>

          @if(session('messege'))
          <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session('messege') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif


          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
          </div>
        </form>

      </div>
    </div>
    <!-- /Login Card -->
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/login.js') }}"></script>
@endsection