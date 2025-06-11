@extends('layouts.app')

@section('title', 'Galeri Foto Profesional')

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
