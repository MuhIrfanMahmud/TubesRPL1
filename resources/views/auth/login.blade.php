@extends('layouts.auth')

@section('title', 'Login - PhotoGallery Pro')

@section('content')
<div class="auth-card">
    <!-- Logo and Title -->
    <div class="card-header">
        <div class="display-5 mb-3">
            <i class="bi bi-camera text-primary"></i>
        </div>
        <h1>Welcome Back</h1>
        <p class="text-muted">Sign in to continue to PhotoGallery</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ $error }}
                </div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ old('email') }}"
                required autofocus>
        </div>

        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="form-label">Password</label>
                <a href="{{ route('password.request') }}" class="text-decoration-none small">
                    Forgot Password?
                </a>
            </div>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                id="password" name="password" required>
        </div>

        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn btn-primary">Sign In</button>

        <div class="mt-4 text-center">
            <p class="mb-0">Don't have an account?
                <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a>
            </p>
        </div>
    </form>
</div>
@endsection
