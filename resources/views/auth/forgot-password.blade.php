@extends('layouts.app')

@section('title', 'Forgot Password - PhotoGallery Pro')

@section('content')
<div class="auth-card">
    <div class="card-header">
        <div class="display-5 mb-3">
            <i class="bi bi-key text-primary"></i>
        </div>
        <h1>Forgot Password</h1>
        <p class="text-muted">Enter your email to reset password</p>
    </div>

    <!-- Status Message -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>

        <div class="mt-4 text-center">
            <p class="mb-0">Remember your password?
                <a href="{{ route('login') }}" class="text-decoration-none">Back to login</a>
            </p>
        </div>
    </form>
</div>
@endsection
