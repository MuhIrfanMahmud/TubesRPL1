@extends('layouts.app')

@section('title', 'PhotoGallery Pro - Professional Photo Gallery')

@section('content')
<!-- Hero Section with Gradient Background -->
<div class="hero-section position-relative overflow-hidden mb-5">
    <div class="container py-5">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6 py-5">
                <h1 class="display-3 fw-bold text-white mb-4">
                    Jelajahi Dunia Fotografi<br>
                    <span class="text-gradient">PhotoGallery Pro</span>
                </h1>
                <p class="lead text-white-50 mb-5">
                    Platform berbagi foto profesional untuk fotografer dan pecinta seni visual.
                    Bagikan karya terbaikmu dan temukan inspirasi dari fotografer lainnya.
                </p>

            </div>
            <div class="col-lg-6 position-relative">
                <!-- Floating Image Grid -->
                <div class="floating-images">
                    @foreach($photos->take(4) as $photo)
                    <div class="floating-image-item shadow-lg">
                        @if($photo->image_path)
                            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}"
                                class="img-fluid rounded">
                        @else
                            <div class="placeholder-image rounded">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="container mb-6">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-primary-soft text-primary">
                    <i class="bi bi-image"></i>
                </div>
                <h3 class="stat-number">{{ $totalPhotos }}</h3>
                <p class="stat-label">Total Foto</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-success-soft text-success">
                    <i class="bi bi-tags"></i>
                </div>
                <h3 class="stat-number">{{ $totalCategories }}</h3>
                <p class="stat-label">Kategori</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-info-soft text-info">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h3 class="stat-number">{{ $photos->count() }}</h3>
                <p class="stat-label">Foto Terbaru</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-warning-soft text-warning">
                    <i class="bi bi-star"></i>
                </div>
                <h3 class="stat-number">5.0</h3>
                <p class="stat-label">Rating</p>
            </div>
        </div>
    </div>
</div>

<!-- Latest Photos Section -->
@if($photos->count() > 0)
<section class="latest-photos py-6 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h6 class="text-primary text-uppercase fw-bold mb-3">Galeri Terbaru</h6>
            <h2 class="display-5 fw-bold">Karya Fotografer Terbaik</h2>
            <p class="text-muted">Temukan inspirasi dari koleksi foto terbaru kami</p>
        </div>

        <div class="row g-4">
            @foreach($photos as $photo)
            <div class="col-md-3">
                <div class="photo-card">
                    <div class="photo-card-img">
                        @if($photo->image_path)
                            <img src="{{ asset('storage/' . $photo->image_path) }}"
                                alt="{{ $photo->title }}">
                        @else
                            <div class="placeholder-image">
                                <i class="bi bi-image"></i>
                            </div>
                        @endif
                        <div class="photo-card-overlay">
                            <a href="{{ route('photos.show', $photo->slug) }}"
                               class="btn btn-sm btn-light">
                                <i class="bi bi-eye me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                    <div class="photo-card-body">
                        <h5 class="photo-card-title">{{ $photo->title }}</h5>
                        @if($photo->category)
                            <span class="badge bg-primary-soft text-primary">
                                {{ $photo->category->name }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('photos.index') }}" class="btn btn-primary btn-lg">
                Lihat Semua Foto
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Categories Section -->
@if($categories->count() > 0)
<section class="categories-section py-6">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h6 class="text-primary text-uppercase fw-bold mb-3">Kategori</h6>
            <h2 class="display-5 fw-bold">Jelajahi Kategori</h2>
            <p class="text-muted">Temukan foto berdasarkan kategori yang Anda minati</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-md-2">
                <div class="category-card text-center">
                    <div class="category-icon">
                        <i class="bi bi-collection"></i>
                    </div>
                    <h5 class="category-title">{{ $category->name }}</h5>
                    <p class="category-count">{{ $category->photos_count }} Foto</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="cta-section py-6 bg-primary text-white text-center">
    <div class="container">
        <h2 class="display-5 fw-bold mb-4">Mulai Bagikan Karyamu</h2>
        <p class="lead mb-5">Bergabunglah dengan komunitas fotografer kami dan bagikan karya terbaikmu</p>
        @guest
            <a href="{{ route('register') }}" class="btn btn-lg btn-light">
                Daftar Sekarang
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        @else
            <a href="{{ route('photos.create') }}" class="btn btn-lg btn-light">
                Upload Foto
                <i class="bi bi-cloud-upload ms-2"></i>
            </a>
        @endguest
    </div>
</section>
@endsection
