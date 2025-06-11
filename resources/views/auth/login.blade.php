@extends('layouts.app')

@section('title', 'Login - PhotoGallery Pro')

@section('content')
<div class="auth-container">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center" style="margin-top: -50px; padding-top: 100px;">
        <div class="row justify-content-center w-100">
            <div class="col-md-5">
                <div class="card-modern p-4 p-md-5" data-aos="fade-up" data-aos-duration="1000">
                    <!-- Logo dan Judul -->
                    <div class="text-center mb-4">
                        <div class="display-5 mb-3">
                            <i class="bi bi-camera text-primary"></i>
                        </div>
                        <h2 class="mb-2" style="font-family: 'Playfair Display', serif;">Welcome Back</h2>
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

                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                        <div class="form-floating mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="name@example.com"
                                value="{{ old('email') }}" required autofocus>
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

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="text-primary text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary-modern btn-modern">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
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
                                <a href="#" class="btn btn-outline-secondary w-100" onclick="showComingSoon('Google')">
                                    <i class="bi bi-google me-2"></i>Google
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-outline-secondary w-100" onclick="showComingSoon('Facebook')">
                                    <i class="bi bi-facebook me-2"></i>Facebook
                                </a>
                            </div>
                        </div>

                        <p class="text-center mb-0">Don't have an account?
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true
    });

    // Social login placeholder
    function showComingSoon(provider) {
        alert(`${provider} login will be available soon!`);
    }

    // Form validation enhancement
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });

        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });
</script>
@endsection
