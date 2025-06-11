<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoGallery Pro - Professional Photo Gallery</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Modern Color Palette */
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --primary-900: #0c4a6e;

            --secondary-50: #f8fafc;
            --secondary-100: #f1f5f9;
            --secondary-500: #64748b;
            --secondary-600: #475569;
            --secondary-900: #0f172a;

            --accent-400: #fb7185;
            --accent-500: #f43f5e;
            --accent-600: #e11d48;

            --success-500: #10b981;
            --warning-500: #f59e0b;
            --danger-500: #ef4444;

            /* Advanced Gradients */
            --gradient-hero: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-card: linear-gradient(145deg, #ffffff 0%, #f3f4f6 100%);
            --gradient-accent: linear-gradient(135deg, #ff6b6b 0%, #4ecdc4 100%);
            --gradient-dark: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
            --gradient-glass: linear-gradient(145deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.05) 100%);

            /* Glassmorphism */
            --glass-bg: rgba(255, 255, 255, 0.12);
            --glass-border: rgba(255, 255, 255, 0.15);
            --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            --glass-backdrop: blur(12px);

            /* Advanced Shadows */
            --shadow-soft: 0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04);
            --shadow-medium: 0 4px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-strong: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --shadow-glow: 0 0 20px rgba(14, 165, 233, 0.15);

            /* Transitions */
            --transition-smooth: 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            --transition-spring: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.7;
            color: var(--secondary-900);
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            z-index: -1;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Modern Navigation */
        .navbar-modern {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-backdrop);
            -webkit-backdrop-filter: var(--glass-backdrop);
            border-bottom: 1px solid var(--glass-border);
            box-shadow: var(--shadow-soft);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all var(--transition-smooth);
        }

        .navbar-modern.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow-medium);
        }

        .navbar-brand-modern {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.75rem;
            background: var(--gradient-hero);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all var(--transition-smooth);
        }

        .navbar-brand-modern:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        .nav-link-modern {
            font-weight: 500;
            padding: 0.75rem 1.5rem !important;
            margin: 0 0.25rem;
            border-radius: 50px;
            transition: all var(--transition-smooth);
            position: relative;
            overflow: hidden;
            color: var(--secondary-600) !important;
        }

        .nav-link-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-hero);
            transition: all var(--transition-smooth);
            z-index: -1;
            border-radius: 50px;
        }

        .nav-link-modern:hover::before {
            left: 0;
        }

        .nav-link-modern:hover {
            color: white !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-glow);
        }

        .btn-modern {
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            background: var(--gradient-hero);
            color: white;
            transition: all var(--transition-smooth);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: all var(--transition-spring);
            transform: translate(-50%, -50%);
        }

        .btn-modern:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-modern:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: var(--shadow-strong);
            color: white;
        }

        /* Hero Section Enhanced */
        .hero-modern {
            min-height: 100vh;
            background: var(--gradient-hero);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-modern::before,
        .hero-modern::after {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }

        .hero-modern::before {
            top: -200px;
            right: -200px;
            animation-delay: 0s;
        }

        .hero-modern::after {
            bottom: -200px;
            left: -200px;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-50px) rotate(180deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 3vw, 1.5rem);
            margin-bottom: 3rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .hero-cta {
            animation: fadeInUp 1s ease 0.6s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stats Section */
        .stats-section {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-backdrop);
            border: 1px solid var(--glass-border);
            border-radius: 32px;
            padding: 3rem 2rem;
            margin-top: -100px;
            position: relative;
            z-index: 10;
            box-shadow: var(--shadow-strong);
        }

        .stat-card {
            text-align: center;
            padding: 2rem 1rem;
            border-radius: 24px;
            background: var(--gradient-card);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-accent);
            transform: scaleX(0);
            transition: all var(--transition-smooth);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-medium);
        }

        .stat-number {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            background: var(--gradient-hero);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            color: var(--secondary-600);
            font-weight: 500;
            font-size: 1.1rem;
        }

        /* Filter Section */
        .filter-section {
            padding: 4rem 0;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 32px;
            margin: 4rem 0;
            box-shadow: var(--shadow-soft);
        }

        .filter-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-900);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .filter-title i {
            color: var(--primary-500);
            font-size: 2.5rem;
        }

        .filter-link {
            color: var(--primary-500);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 2px solid transparent;
            transition: all var(--transition-smooth);
            padding-bottom: 2px;
        }

        .filter-link:hover {
            color: var(--primary-600);
            border-bottom-color: var(--primary-500);
            transform: translateY(-1px);
        }

        .search-container {
            position: relative;
            max-width: 500px;
            margin: 2rem auto;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1.5rem 1rem 4rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            background: var(--glass-bg);
            backdrop-filter: var(--glass-backdrop);
            font-size: 1.1rem;
            transition: all var(--transition-smooth);
            color: var(--secondary-900);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: var(--shadow-glow);
            background: rgba(255, 255, 255, 0.9);
        }

        .search-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-500);
            font-size: 1.2rem;
        }

        .search-btn {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: var(--gradient-hero);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            transition: all var(--transition-smooth);
        }

        .search-btn:hover {
            background: var(--gradient-accent);
            transform: translateY(-50%) scale(1.05);
        }

        /* Controls Section */
        .controls-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 3rem 0;
            padding: 1.5rem 2rem;
            background: var(--glass-bg);
            backdrop-filter: var(--glass-backdrop);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
        }

        .view-toggle {
            display: flex;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 0.5rem;
            gap: 0.5rem;
        }

        .view-btn {
            background: transparent;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--secondary-600);
            transition: all var(--transition-smooth);
            font-size: 1.2rem;
        }

        .view-btn.active,
        .view-btn:hover {
            background: var(--gradient-hero);
            color: white;
            transform: scale(1.1);
        }

        .sort-dropdown {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            color: var(--secondary-900);
            font-weight: 500;
            min-width: 150px;
            transition: all var(--transition-smooth);
        }

        .sort-dropdown:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: var(--shadow-glow);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            background: var(--glass-bg);
            backdrop-filter: var(--glass-backdrop);
            border-radius: 32px;
            border: 1px solid var(--glass-border);
            margin: 4rem 0;
        }

        .empty-icon {
            font-size: 6rem;
            color: var(--secondary-500);
            margin-bottom: 2rem;
            opacity: 0.6;
        }

        .empty-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-900);
            margin-bottom: 1rem;
        }

        .empty-subtitle {
            font-size: 1.2rem;
            color: var(--secondary-600);
            margin-bottom: 3rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .stats-section {
                margin-top: -50px;
                padding: 2rem 1rem;
            }

            .stat-card {
                margin-bottom: 1rem;
            }

            .controls-section {
                flex-direction: column;
                gap: 1rem;
            }

            .filter-section {
                padding: 2rem 1rem;
                margin: 2rem 0;
            }

            .search-container {
                margin: 1rem auto;
            }
        }

        /* Micro Animations */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-hero);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gradient-accent);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-modern">
        <div class="container">
            <a class="navbar-brand-modern" href="#">
                <i class="bi bi-camera-reels-fill"></i>
                PhotoGallery Pro
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-4"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="#">
                            <i class="bi bi-house-fill me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="#galeri">
                            <i class="bi bi-images me-1"></i>Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="#tentang">
                            <i class="bi bi-info-circle-fill me-1"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn-modern" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-modern">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Galeri Foto Profesional</h1>
                <p class="hero-subtitle">Temukan dan bagikan momen terbaik dalam koleksi foto berkualitas tinggi yang memukau</p>
                <div class="hero-cta">
                    <a href="#galeri" class="btn-modern me-3">
                        <i class="bi bi-play-circle-fill"></i>
                        Jelajahi Galeri
                    </a>
                    <a href="#" class="btn-modern" style="background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.3);">
                        <i class="bi bi-cloud-upload-fill"></i>
                        Upload Foto
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="container">
        <div class="stats-section" id="galeri">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <span class="stat-number">0</span>
                        <div class="stat-label">Total Foto</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <span class="stat-number">0</span>
                        <div class="stat-label">Kategori</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <span class="stat-number">0</span>
                        <div class="stat-label">Foto Terbaru</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <span class="stat-number">4.9</span>
                        <div class="stat-label">Rating ⭐</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="text-center">
                <h2 class="filter-title justify-content-center">
                    <i class="bi bi-funnel-fill"></i>
                    Filter Kategori
                </h2>
                <p class="mb-4">
                    <a href="#" class="filter-link">Semua Foto</a>
                </p>

                <!-- Search Bar -->
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Cari foto berdasarkan judul atau deskripsi...">
                    <button class="search-btn">
                        <i class="bi bi-search me-1"></i>Cari
                    </button>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="controls-section">
            <div class="d-flex align-items-center">
                <span class="me-3 fw-semibold">Tampilan:</span>
                <div class="view-toggle">
                    <button class="view-btn active">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                    </button>
                    <button class="view-btn">
                        <i class="bi bi-list-ul"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <span class="me-3 fw-semibold">Urutkan:</span>
                <select class="sort-dropdown">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>Nama A-Z</option>
                    <option>Nama Z-A</option>
                </select>
            </div>
        </div>

        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="bi bi-camera-fill"></i>
            </div>
            <h3 class="empty-title">Belum Ada Foto</h3>
            <p class="empty-subtitle">
                Mulai upload foto pertama Anda untuk membangun galeri yang menakjubkan dan berbagi momen indah dengan dunia.
            </p>
            <a href="{{ route('login') }}" class="btn-modern pulse">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Login untuk Upload
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-modern');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
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

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');

        searchBtn.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query) {
                console.log('Searching for:', query);
                // Add search logic here
            }
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });

        // View toggle
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Animated number counter for stats
        function animateNumber(element, target) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = target === 4.9 ? current.toFixed(1) : Math.floor(current);
            }, 50);
        }

        // Trigger animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const value = stat.textContent;
                        stat.textContent = '0';
                        if (value === '4.9') {
                            animateNumber(stat, 4.9);
                        } else {
                            animateNumber(stat, parseInt(value));
                        }
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>
</html>
