@extends('layouts.app')

@section('title', 'Tentang PhotoGallery Pro')

@push('styles')
<style>
    /* ===== CSS VARIABLES ===== */
    :root {
        --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --gradient-success: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --gradient-body: linear-gradient(135deg, #667eea 0%, #805fa0 50%, #f093fb 100%);

        --glass-bg: rgba(255, 255, 255, 0.08);
        --glass-border: rgba(255, 255, 255, 0.15);
        --glass-hover: rgba(255, 255, 255, 0.12);

        --shadow-sm: 0 4px 20px rgba(31, 38, 135, 0.15);
        --shadow-md: 0 8px 32px rgba(31, 38, 135, 0.25);
        --shadow-lg: 0 15px 40px rgba(31, 38, 135, 0.35);
        --shadow-xl: 0 25px 50px rgba(31, 38, 135, 0.45);

        --text-primary: rgba(255, 255, 255, 0.95);
        --text-secondary: rgba(255, 255, 255, 0.8);
        --text-muted: rgba(255, 255, 255, 0.6);

        --border-radius-sm: 12px;
        --border-radius-md: 20px;
        --border-radius-lg: 25px;
        --border-radius-xl: 30px;

        --transition-fast: 0.2s ease;
        --transition-normal: 0.3s ease;
        --transition-slow: 0.5s ease;
    }

    /* ===== BASE STYLES ===== */
    * {
        box-sizing: border-box;
    }

    body {
        background: var(--gradient-body);
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        line-height: 1.6;
        color: var(--text-primary);
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* ===== GLASS MORPHISM COMPONENTS ===== */
    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
        transition: all var(--transition-normal);
    }

    .glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.8s ease;
        z-index: 1;
    }

    .glass-card:hover::before {
        left: 100%;
    }

    .glass-card:hover {
        background: var(--glass-hover);
        box-shadow: var(--shadow-lg);
        transform: translateY(-5px);
    }

    /* ===== HERO SECTION ===== */
    .hero-section {
        padding: 5rem 3rem;
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.4rem);
        color: var(--text-secondary);
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-background {
        position: absolute;
        top: 50%;
        right: -50px;
        transform: translateY(-50%);
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        opacity: 0.15;
        pointer-events: none;
        z-index: 1;
    }

    .hero-bg-item {
        width: 100px;
        height: 100px;
        border-radius: var(--border-radius-sm);
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        display: flex;
        align-items: center;
        justify-content: center;
        animation: float 4s ease-in-out infinite;
    }

    .hero-bg-item:nth-child(2) {
        animation-delay: -1s;
    }

    .hero-bg-item:nth-child(3) {
        animation-delay: -2s;
    }

    .hero-bg-item:nth-child(4) {
        animation-delay: -3s;
    }

    .hero-bg-item i {
        font-size: 2rem;
        color: var(--text-muted);
    }

    /* ===== BUTTONS ===== */
    .btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
        z-index: 1;
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
        transition: all var(--transition-normal);
        transform: translate(-50%, -50%);
        z-index: -1;
    }

    .btn-modern:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary {
        background: var(--gradient-primary);
        color: white;
        border: none;
        box-shadow: var(--shadow-sm);
    }

    .btn-primary:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        filter: brightness(1.1);
    }

    /* ===== FEATURE CARDS ===== */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .feature-card {
        padding: 2.5rem 2rem;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        border-radius: var(--border-radius-md);
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        transition: all var(--transition-normal);
        box-shadow: var(--shadow-sm);
    }

    .feature-card:hover .feature-icon {
        transform: rotateY(360deg) scale(1.1);
        box-shadow: var(--shadow-md);
    }

    .feature-icon i {
        font-size: 2rem;
        color: white;
    }

    .feature-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }

    .feature-description {
        color: var(--text-secondary);
        flex-grow: 1;
        display: flex;
        align-items: center;
    }

    /* ===== STATS SECTION ===== */
    .stats-section {
        padding: 3rem 2rem;
        margin-bottom: 4rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
    }

    .stat-number {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 800;
        background: var(--gradient-accent);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 1.1rem;
        font-weight: 500;
    }

    /* ===== TEAM SECTION ===== */
    .team-section {
        padding: 3rem 2rem;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .team-member {
        text-align: center;
        padding: 2rem 1.5rem;
        transition: all var(--transition-normal);
    }

    .team-member:hover {
        transform: translateY(-8px);
    }

    .member-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: var(--gradient-secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: var(--shadow-md);
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
    }

    .member-avatar::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s ease;
    }

    .team-member:hover .member-avatar::before {
        left: 100%;
    }

    .team-member:hover .member-avatar {
        transform: scale(1.1);
        box-shadow: var(--shadow-lg);
    }

    .member-avatar i {
        font-size: 3rem;
        color: white;
        z-index: 2;
        position: relative;
    }

    .member-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .member-role {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .member-description {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    /* ===== VISION MISSION SECTION ===== */
    .vision-mission-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease forwards;
    }

    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    .animate-pulse {
        animation: pulse 2s ease-in-out infinite;
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 1024px) {
        .hero-background {
            display: none;
        }

        .features-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 3rem 1.5rem;
            margin-bottom: 3rem;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .team-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .vision-mission-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .glass-card {
            margin: 0 0.5rem;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .hero-section,
        .stats-section,
        .team-section {
            padding: 2rem 1rem;
        }
    }

    /* ===== UTILITY CLASSES ===== */
    .text-center { text-align: center; }
    .mb-4 { margin-bottom: 2rem; }
    .mb-5 { margin-bottom: 3rem; }
    .py-5 { padding: 3rem 0; }

    /* ===== ENHANCED INTERACTIVITY ===== */
    .interactive-hover {
        transition: all var(--transition-normal);
    }

    .interactive-hover:hover {
        transform: translateY(-2px);
    }

    /* ===== SCROLL ANIMATIONS ===== */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .scroll-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <section class="hero-section glass-card scroll-reveal">
        <div class="hero-content">
            <h1 class="hero-title">Jelajahi Dunia Fotografi PhotoGallery Pro</h1>
            <p class="hero-subtitle">
                Platform berbagi foto profesional untuk fotografer dan pecinta seni visual.
                Bagikan karya terbaikmu dan temukan inspirasi dari fotografer lainnya.
            </p>
            <a href="{{ route('photos.index') }}" class="btn-modern btn-primary">
                <i class="bi bi-camera"></i>
                Jelajahi Galeri
            </a>
        </div>

        <!-- Background Elements -->
        <div class="hero-background">
            <div class="hero-bg-item">
                <i class="bi bi-image"></i>
            </div>
            <div class="hero-bg-item">
                <i class="bi bi-camera"></i>
            </div>
            <div class="hero-bg-item">
                <i class="bi bi-palette"></i>
            </div>
            <div class="hero-bg-item">
                <i class="bi bi-heart"></i>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-grid">
        <article class="feature-card glass-card scroll-reveal">
            <div class="feature-icon">
                <i class="bi bi-cloud-upload"></i>
            </div>
            <h3 class="feature-title">Upload Mudah</h3>
            <p class="feature-description">
                Upload foto dengan mudah dan cepat. Sistem drag & drop yang intuitif
                memungkinkan Anda berbagi karya dalam hitungan detik.
            </p>
        </article>

        <article class="feature-card glass-card scroll-reveal">
            <div class="feature-icon">
                <i class="bi bi-palette"></i>
            </div>
            <h3 class="feature-title">Kategori Beragam</h3>
            <p class="feature-description">
                Organisir foto Anda dalam berbagai kategori. Dari landscape, portrait,
                hingga street photography - semua tertata rapi.
            </p>
        </article>

        <article class="feature-card glass-card scroll-reveal">
            <div class="feature-icon">
                <i class="bi bi-people"></i>
            </div>
            <h3 class="feature-title">Komunitas Kreatif</h3>
            <p class="feature-description">
                Bergabung dengan komunitas fotografer dari seluruh dunia.
                Saling berbagi inspirasi dan teknik fotografi terbaru.
            </p>
        </article>
    </section>

    <!-- Stats Section -->
    <section class="stats-section glass-card scroll-reveal">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number" data-count="1250">0</span>
                <div class="stat-label">Foto Terpublikasi</div>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-count="350">0</span>
                <div class="stat-label">Fotografer Aktif</div>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-count="25">0</span>
                <div class="stat-label">Kategori Foto</div>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-count="15000">0</span>
                <div class="stat-label">Pengunjung Bulanan</div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section glass-card scroll-reveal">
        <h2 class="section-title">Tim PhotoGallery Pro</h2>
        <div class="team-grid">
            <article class="team-member">
                <div class="member-avatar">
                    <i class="bi bi-person-circle"></i>
                </div>
                <h4 class="member-name">Irfan Rahman</h4>
                <p class="member-role">Founder & Lead Developer</p>
                <p class="member-description">
                    Passionate developer dengan 5+ tahun pengalaman dalam
                    membangun platform digital untuk komunitas kreatif.
                </p>
            </article>

            <article class="team-member">
                <div class="member-avatar">
                    <i class="bi bi-camera-fill"></i>
                </div>
                <h4 class="member-name">Sarah Photography</h4>
                <p class="member-role">Head of Community</p>
                <p class="member-description">
                    Fotografer profesional yang membantu membangun dan
                    mengembangkan komunitas fotografer di platform ini.
                </p>
            </article>

            <article class="team-member">
                <div class="member-avatar">
                    <i class="bi bi-palette-fill"></i>
                </div>
                <h4 class="member-name">Alex Designer</h4>
                <p class="member-role">UI/UX Designer</p>
                <p class="member-description">
                    Creative designer yang menciptakan pengalaman visual
                    yang memukau dan user-friendly untuk semua pengguna.
                </p>
            </article>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="vision-mission-grid">
        <article class="feature-card glass-card scroll-reveal">
            <div class="feature-icon">
                <i class="bi bi-eye"></i>
            </div>
            <h3 class="feature-title">Visi Kami</h3>
            <p class="feature-description">
                Menjadi platform terdepan untuk berbagi dan mengapresiasi karya fotografi,
                menghubungkan fotografer dari seluruh dunia dalam satu komunitas yang inspiratif.
            </p>
        </article>

        <article class="feature-card glass-card scroll-reveal">
            <div class="feature-icon">
                <i class="bi bi-target"></i>
            </div>
            <h3 class="feature-title">Misi Kami</h3>
            <p class="feature-description">
                Memberikan platform yang mudah, aman, dan inspiratif untuk para fotografer
                berbagi karya, belajar, dan tumbuh bersama dalam dunia fotografi.
            </p>
        </article>
    </section>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== Enhanced Counter Animation =====
    function animateCounter() {
        const counters = document.querySelectorAll('.stat-number');

        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target.toLocaleString('id-ID');
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current).toLocaleString('id-ID');
                }
            }, 16);
        });
    }

    // ===== Improved Intersection Observer =====
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');

                // Trigger counter animation when stats section is visible
                if (entry.target.classList.contains('stats-section')) {
                    setTimeout(animateCounter, 200);
                }

                // Unobserve after animation
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // ===== Initialize Scroll Animations =====
    const scrollElements = document.querySelectorAll('.scroll-reveal');
    scrollElements.forEach((el, index) => {
        // Stagger animation delays
        el.style.transitionDelay = `${index * 0.1}s`;
        observer.observe(el);
    });

    // ===== Enhanced Parallax Effect =====
    let ticking = false;

    function updateParallax() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.hero-background');

        parallaxElements.forEach(element => {
            const speed = scrolled * 0.2;
            element.style.transform = `translateY(calc(-50% + ${speed}px))`;
        });

        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    });

    // ===== Enhanced Feature Card Interactions =====
    const featureCards = document.querySelectorAll('.feature-card');
    featureCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.boxShadow = 'var(--shadow-xl)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = 'var(--shadow-md)';
        });
    });

    // ===== Team Member Enhanced Interactions =====
    const teamMembers = document.querySelectorAll('.team-member');
    teamMembers.forEach(member => {
        const avatar = member.querySelector('.member-avatar');

        member.addEventListener('mouseenter', function() {
            avatar.style.transform = 'scale(1.15) rotateY(10deg)';
            this.style.transform = 'translateY(-10px)';
        });

        member.addEventListener('mouseleave', function() {
            avatar.style.transform = 'scale(1) rotateY(0deg)';
            this.style.transform = 'translateY(0)';
        });
    });

    // ===== Button Ripple Effect =====
    const buttons = document.querySelectorAll('.btn-modern');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                width: 20px;
                height: 20px;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                transform: translate(-50%, -50%) scale(0);
                animation: ripple 0.6s ease-out;
                left: ${x}px;
                top: ${y}px;
                pointer-events: none;
            `;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // ===== Add CSS for ripple animation =====
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: translate(-50%, -50%) scale(4);
                opacity: 0;
            }
        }

        .btn-modern {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);

    // ===== Performance: Debounced Resize Handler =====
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            // Recalculate parallax positions
            updateParallax();
        }, 150);
    });
});
</script>
@endpush
@endsection
