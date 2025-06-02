<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Photo Gallery Pro')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --accent-color: #f59e0b;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* Header & Navigation */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-custom.scrolled {
            padding: 0.5rem 0;
            box-shadow: var(--shadow-light);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 1.8rem;
            color: var(--dark-color) !important;
            text-decoration: none;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .nav-link {
            font-weight: 500;
            color: var(--secondary-color) !important;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: var(--gradient-1);
            padding: 4rem 0;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            opacity: 0.1;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .btn-hero {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-hero:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        /* Cards & Components */
        .card-modern {
            background: white;
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card-modern:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-heavy);
        }

        .photo-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .photo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(0,0,0,0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .photo-card:hover::before {
            opacity: 1;
        }

        .photo-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .photo-card:hover img {
            transform: scale(1.1);
        }

        .photo-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 2rem 1.5rem 1.5rem;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            z-index: 2;
        }

        .photo-card:hover .photo-overlay {
            transform: translateY(0);
        }

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 2rem 0;
            border-radius: 20px;
            margin: 2rem 0;
            box-shadow: var(--shadow-light);
        }

        .filter-btn {
            background: transparent;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            margin: 0.25rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Buttons */
        .btn-modern {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .btn-primary-modern {
            background: var(--gradient-1);
            color: white;
        }

        .btn-accent-modern {
            background: var(--gradient-2);
            color: white;
        }

        /* Form Elements */
        .form-control-modern {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control-modern:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-2px);
        }

        /* Stats Section */
        .stats-section {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            margin: 3rem 0;
            box-shadow: var(--shadow-light);
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }

        .stat-label {
            color: var(--secondary-color);
            font-weight: 500;
            margin-top: 0.5rem;
        }

        /* Footer */
        .footer-modern {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: 5rem;
        }

        .footer-section h5 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 1.5rem;
            color: var(--accent-color);
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            padding: 0.25rem 0;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .photo-card img {
                height: 200px;
            }
            
            .hero-section {
                padding: 2rem 0;
            }
        }

        /* Loading Animation */
        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('photos.index') }}">
                <i class="bi bi-camera-fill me-2"></i>PhotoGallery Pro
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photos.index') }}">
                            <i class="bi bi-house me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">
                            <i class="bi bi-images me-1"></i>Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">
                            <i class="bi bi-info-circle me-1"></i>Tentang
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">
                                <i class="bi bi-folder me-1"></i>Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary-modern btn-modern ms-2" href="{{ route('photos.create') }}">
                                <i class="bi bi-cloud-upload me-1"></i>Upload
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-primary-modern btn-modern ms-2" href="/login">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Only on homepage) -->
    @if(request()->routeIs('photos.index'))
        <section class="hero-section" data-aos="fade-down">
            <div class="container">
                <h1 class="hero-title">Galeri Foto Profesional</h1>
                <p class="hero-subtitle">Temukan dan bagikan momen terbaik dalam koleksi foto berkualitas tinggi</p>
                <a href="#galeri" class="btn btn-hero">
                    <i class="bi bi-arrow-down me-2"></i>Jelajahi Galeri
                </a>
            </div>
        </section>
    @endif

    <!-- Main Content -->
    <main class="container" style="margin-top: @if(request()->routeIs('photos.index')) 0 @else 100px @endif; padding-top: 2rem;">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show card-modern" role="alert" data-aos="fade-up">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-modern">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>PhotoGallery Pro</h5>
                        <p class="text-muted">Platform galeri foto profesional untuk menyimpan dan berbagi momen terbaik Anda dengan kualitas tinggi.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="footer-link d-inline-block me-3">
                                <i class="bi bi-facebook fs-4"></i>
                            </a>
                            <a href="#" class="footer-link d-inline-block me-3">
                                <i class="bi bi-instagram fs-4"></i>
                            </a>
                            <a href="#" class="footer-link d-inline-block me-3">
                                <i class="bi bi-twitter fs-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Menu</h5>
                        <a href="{{ route('photos.index') }}" class="footer-link">Beranda</a>
                        <a href="#galeri" class="footer-link">Galeri</a>
                        <a href="#tentang" class="footer-link">Tentang</a>
                        <a href="/contact" class="footer-link">Kontak</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Layanan</h5>
                        <a href="#" class="footer-link">Upload Foto</a>
                        <a href="#" class="footer-link">Manajemen Galeri</a>
                        <a href="#" class="footer-link">Berbagi Koleksi</a>
                        <a href="#" class="footer-link">Backup Cloud</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Kontak</h5>
                        <p class="footer-link">
                            <i class="bi bi-envelope me-2"></i>info@photogallery.com
                        </p>
                        <p class="footer-link">
                            <i class="bi bi-phone me-2"></i>+62 123 456 789
                        </p>
                        <p class="footer-link">
                            <i class="bi bi-geo-alt me-2"></i>Jakarta, Indonesia
                        </p>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: #374151;">
            <div class="text-center">
                <p class="text-muted mb-0">&copy; {{ date('Y') }} PhotoGallery Pro. Seluruh hak cipta dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>