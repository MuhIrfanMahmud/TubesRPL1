@extends('layouts.app')

@section('title', 'Galeri Foto Profesional')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --glass-bg: rgba(255, 255, 255, 0.1);
        --glass-border: rgba(255, 255, 255, 0.2);
        --shadow-light: 0 8px 32px rgba(31, 38, 135, 0.37);
        --shadow-hover: 0 15px 40px rgba(31, 38, 135, 0.5);
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #805fa0 50%, #f093fb 100%);
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    #galeri {
        padding: 2rem 0;
    }

    /* Glassmorphism Stats Section */
    .stats-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-light);
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .stat-item:hover::before {
        left: 100%;
    }

    .stat-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        background: rgba(255, 255, 255, 0.1);
    }

    .stat-number {
        display: block;
        font-size: 2.5rem;
        font-weight: 700;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Modern Filter Section */
    .filter-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-light);
    }

    .filter-section h4 {
        color: white;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .filter-btn {
        padding: 0.7rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.8);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .filter-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--primary-gradient);
        transition: left 0.3s ease;
        z-index: -1;
    }

    .filter-btn:hover::before,
    .filter-btn.active::before {
        left: 0;
    }

    .filter-btn:hover,
    .filter-btn.active {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .filter-btn .badge {
        background: rgba(255, 255, 255, 0.2) !important;
        color: white !important;
    }

    /* Search Section */
    .search-section form {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: var(--shadow-light);
    }

    .form-control-modern {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        color: white;
        padding: 0.8rem 1rem;
    }

    .form-control-modern::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control-modern:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        color: white;
    }

    .input-group-text {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.8);
    }

    .btn-primary-modern {
        background: var(--primary-gradient);
        border: none;
        border-radius: 10px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-primary-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-primary-modern:hover::before {
        left: 100%;
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* Photo Cards with Floating Effect */
    .photo-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow-light);
        position: relative;
    }

    .photo-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        z-index: 1;
    }

    .photo-card:hover::before {
        opacity: 1;
    }

    .photo-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-hover);
    }

    .photo-card-img {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
    }

    .photo-card-img img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .photo-card:hover .photo-card-img img {
        transform: scale(1.1);
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, transparent 50%);
        color: white;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        opacity: 0;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px);
    }

    .photo-card:hover .photo-overlay {
        opacity: 1;
    }

    .photo-overlay h5 {
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    /* Modern Buttons */
    .btn-modern {
        border-radius: 50px;
        padding: 0.6rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
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
        transition: all 0.3s ease;
        transform: translate(-50%, -50%);
    }

    .btn-modern:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Dropdown Styles */
    .dropdown-menu {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 15px;
        box-shadow: var(--shadow-light);
    }

    .dropdown-item {
        color: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
        border-radius: 10px;
        margin: 0.2rem;
    }

    .dropdown-item:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    /* List View Styles */
    .card-modern {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        box-shadow: var(--shadow-light);
        transition: all 0.3s ease;
    }

    .card-modern:hover {
        transform: translateX(10px);
        box-shadow: var(--shadow-hover);
    }

    /* Empty State */
    .empty-state {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: var(--shadow-light);
    }

    .empty-state i {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .empty-state h4 {
        color: white;
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: rgba(255, 255, 255, 0.8);
    }

    /* View Toggle Buttons */
    .btn-group .btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
    }

    .btn-group .btn:hover,
    .btn-group .btn.active {
        background: var(--primary-gradient);
        color: white;
        transform: scale(1.05);
    }

    /* Floating Action Button */
    .fab {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--secondary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        z-index: 1000;
        text-decoration: none;
        color: white;
    }

    .fab:hover {
        transform: scale(1.1) rotate(360deg);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .filter-buttons {
            justify-content: center;
        }

        .stat-number {
            font-size: 2rem;
        }

        .photo-card {
            margin-bottom: 1rem;
        }

        .fab {
            bottom: 1rem;
            right: 1rem;
            width: 50px;
            height: 50px;
        }
    }

    /* Animations */
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

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease forwards;
    }

    /* Loading Skeleton */
    .loading-skeleton {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 25%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.1) 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }

    /* Pagination */
    .pagination .page-link {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        margin: 0 0.2rem;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover,
    .pagination .page-item.active .page-link {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
    }
</style>

@section('content')
<div id="galeri">
    <!-- Stats Section -->
    <div class="stats-section" data-aos="fade-up">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">{{ $photos->count() }}</span>
                    <div class="stat-label">Total Foto</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">{{ $categories->count() }}</span>
                    <div class="stat-label">Kategori</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">{{ $photos->where('created_at', '>=', now()->subDays(7))->count() }}</span>
                    <div class="stat-label">Foto Terbaru</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number">4.9</span>
                    <div class="stat-label">Rating ⭐</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="mb-3 mb-md-0">
                    <i class="bi bi-funnel me-2 text-primary"></i>Filter Kategori
                </h4>
                <div class="filter-buttons">
                    <a href="{{ route('photos.index') }}"
                       class="filter-btn {{ !request('category') ? 'active' : '' }}">
                        Semua Foto
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('photos.index', ['category' => $cat->id]) }}"
                           class="filter-btn {{ request('category') == $cat->id ? 'active' : '' }}">
                            {{ $cat->name }}
                            <span class="badge bg-light text-dark ms-1">{{ $cat->photos->count() }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="d-flex gap-2 justify-content-md-end">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-sort-down me-1"></i>Urutkan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('photos.index', array_merge(request()->all(), ['sort' => 'newest'])) }}">Terbaru</a></li>
                            <li><a class="dropdown-item" href="{{ route('photos.index', array_merge(request()->all(), ['sort' => 'oldest'])) }}">Terlama</a></li>
                            <li><a class="dropdown-item" href="{{ route('photos.index', array_merge(request()->all(), ['sort' => 'title'])) }}">Berdasarkan Judul</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="view" id="grid-view" autocomplete="off" checked>
                        <label class="btn btn-outline-secondary" for="grid-view">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </label>

                        <input type="radio" class="btn-check" name="view" id="list-view" autocomplete="off">
                        <label class="btn btn-outline-secondary" for="list-view">
                            <i class="bi bi-list"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-section mb-4" data-aos="fade-up" data-aos-delay="200">
        <form method="GET" class="row g-2">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text"
                           name="search"
                           class="form-control form-control-modern border-start-0"
                           placeholder="Cari foto berdasarkan judul..."
                           value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary-modern btn-modern w-100">
                    <i class="bi bi-search me-1"></i>Cari
                </button>
            </div>
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
        </form>
    </div>

    <!-- Photo Gallery Grid -->
    <div class="gallery-container" id="photo-gallery">
        @if($photos->count() > 0)
            <div class="row g-4" id="grid-container">
                @foreach($photos as $index => $photo)
                    <div class="col-lg-4 col-md-6 photo-item" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 100 }}">
                        <div class="photo-card card-modern">
                            <div class="photo-card-img position-relative">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" style="display:block;">

                                <!-- Overlay dengan informasi -->
                                <div class="photo-overlay">
                                    <h5 class="mb-2">{{ $photo->title }}</h5>
                                    <p class="mb-2 opacity-75">
                                        <i class="bi bi-folder me-1"></i>{{ $photo->category->name ?? 'Tanpa Kategori' }}
                                    </p>
                                    <p class="mb-3 opacity-75 small">
                                        <i class="bi bi-calendar me-1"></i>{{ $photo->created_at->format('d M Y') }}
                                    </p>

                                    <div class="d-flex gap-2">
                                        <a href="{{ route('photos.show', $photo->slug) }}"
                                           class="btn btn-sm btn-light flex-fill">
                                            <i class="bi bi-eye me-1"></i>Lihat
                                        </a>
                                        <a href="{{ asset('storage/' . $photo->image_path) }}"
                                           class="btn btn-sm btn-primary"
                                           download="{{ $photo->title }}">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        @auth
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle"
                                                        type="button"
                                                        data-bs-toggle="dropdown">
                                                    <i class="bi bi-three-dots"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('photos.edit', $photo) }}">
                                                            <i class="bi bi-pencil me-2"></i>Edit
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{ route('photos.destroy', $photo) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                                            @csrf @method('DELETE')
                                                            <button class="dropdown-item text-danger">
                                                                <i class="bi bi-trash me-2"></i>Hapus
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- List View (Hidden by default) -->
            <div class="d-none" id="list-container">
                @foreach($photos as $photo)
                    <div class="card card-modern mb-3" data-aos="fade-right">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $photo->image_path) }}"
                                     class="img-fluid rounded-start h-100"
                                     style="height: 220px !important; object-fit: cover !important; border-radius: 15px !important;"
                                     alt="{{ $photo->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $photo->title }}</h5>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <i class="bi bi-folder me-1"></i>{{ $photo->category->name ?? 'Tanpa Kategori' }}
                                            <i class="bi bi-calendar ms-3 me-1"></i>{{ $photo->created_at->format('d M Y') }}
                                        </small>
                                    </p>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('photos.show', $photo->slug) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye me-1"></i>Lihat Detail
                                        </a>
                                        <a href="{{ asset('storage/' . $photo->image_path) }}"
                                           class="btn btn-outline-secondary btn-sm"
                                           download="{{ $photo->title }}">
                                            <i class="bi bi-download me-1"></i>Download
                                        </a>
                                        @auth
                                            <a href="{{ route('photos.edit', $photo) }}" class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('photos.destroy', $photo) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($photos instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-center mt-5">
                    {{ $photos->links() }}
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-5" data-aos="fade-up">
                <div class="empty-state">
                    <i class="bi bi-images display-1 text-muted mb-3"></i>
                    <h4 class="text-muted">Belum Ada Foto</h4>
                    <p class="text-muted mb-4">
                        @if(request('search') || request('category'))
                            Tidak ada foto yang sesuai dengan pencarian Anda.
                        @else
                            Mulai upload foto pertama Anda untuk membangun galeri yang menakjubkan.
                        @endif
                    </p>
                    @auth
                        @if(!request('search') && !request('category'))
                            <a href="{{ route('photos.create') }}" class="btn btn-primary-modern btn-modern">
                                <i class="bi bi-cloud-upload me-2"></i>Upload Foto Pertama
                            </a>
                        @endif
                    @else
                        <a href="/login" class="btn btn-primary-modern btn-modern">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login untuk Upload
                        </a>
                    @endauth

                    @if(request('search') || request('category'))
                        <div class="mt-3">
                            <a href="{{ route('photos.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Lihat Semua Foto
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // View toggle functionality
    document.getElementById('grid-view').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('grid-container').classList.remove('d-none');
            document.getElementById('list-container').classList.add('d-none');
        }
    });

    document.getElementById('list-view').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('grid-container').classList.add('d-none');
            document.getElementById('list-container').classList.remove('d-none');
        }
    });

    // Lazy loading images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.remove('loading-skeleton');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[loading="lazy"]').forEach(img => {
            imageObserver.observe(img);
        });
    }
</script>
@endpush
@endsection
