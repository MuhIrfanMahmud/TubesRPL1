<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center" style="margin-top: -100px">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card-modern p-4 p-md-5" data-aos="fade-up" data-aos-duration="1000">
                <!-- Logo dan Judul -->
                <div class="text-center mb-4">
                    <div class="display-5 mb-3">
                        <i class="bi bi-person-plus text-primary"></i>
                    </div>
                    <h2 class="mb-2" style="font-family: 'Playfair Display', serif;">Create Account</h2>
                    <p class="text-muted">Join and explore PhotoGallery</p>
                </div>

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

                <form method="POST" action="{{ route('register') }}" class="register-form">
                    @csrf

                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                        <label for="name">
                            <i class="bi bi-person me-2"></i>Full Name
                        </label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="email">
                            <i class="bi bi-envelope me-2"></i>Email Address
                        </label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password" required>
                        <label for="password">
                            <i class="bi bi-lock me-2"></i>Password
                        </label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Confirm Password" required>
                        <label for="password_confirmation">
                            <i class="bi bi-shield-lock me-2"></i>Confirm Password
                        </label>
                    </div>

                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary-modern btn-modern">
                            <i class="bi bi-person-check me-2"></i>Sign Up
                        </button>
                    </div>

                    <div class="position-relative mb-4">
                        <hr>
                        <span class="position-absolute top-50 start-50 translate-middle px-3 bg-white text-muted">
                            or continue with
                        </span>
                    </div>

                    <div class="row g-2 mb-4">
                        <div class="col">
                            <a href="#" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-google me-2"></i>Google
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </a>
                        </div>
                    </div>

                    <p class="text-center mb-0">Already have an account?
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.register-form .form-control {
    border-radius: 12px;
    border: 1px solid var(--glass-border);
    background: var(--glass-bg);
    padding: 1rem 1rem;
    height: calc(3.5rem + 2px);
    line-height: 1.25;
    transition: all 0.3s ease;
}

.register-form .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.15);
    transform: translateY(-2px);
}

.register-form .btn {
    padding: 0.8rem 1.5rem;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.register-form .btn-outline-secondary:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
    transform: translateY(-2px);
}

.alert {
    border: none;
    border-radius: 12px;
    padding: 1rem 1.25rem;
}

.alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.register-form {
    animation: slideIn 0.5s ease-out;
}
</style>
@endsection
