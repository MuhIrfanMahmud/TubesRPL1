@extends('layouts.app')

@section('title', 'Reset Password - PhotoGallery Pro')

@section('content')
<div class="auth-card">
    <div class="card-header">
        <div class="display-5 mb-3">
            <i class="bi bi-shield-lock text-primary"></i>
        </div>
        <h1>Reset Password</h1>
        <p class="text-muted">Create your new password</p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ old('email', $request->email) }}" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                id="password" name="password" required>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control"
                id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>

        <div class="mt-4 text-center">
            <p class="mb-0">Remember your password?
                <a href="{{ route('login') }}" class="text-decoration-none">Back to login</a>
            </p>
        </div>
    </form>
</div>
@endsection
