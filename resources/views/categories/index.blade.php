  <!-- index.blade.php -->

@extends('layouts.app')

@section('title', 'Daftar Kategori')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
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

    /* Title Section */
    .gallery-title {
        color: white;
        font-weight: 700;
        margin-bottom: 2rem;
        text-align: center;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 2.2rem;
    }

    /* Alert Styles */
    .alert-success {
        background: rgba(40, 167, 69, 0.15);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(40, 167, 69, 0.3);
        border-radius: 15px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        border-left: 4px solid #28a745;
    }

    /* Header Section */
    .header-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--shadow-light);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .header-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .header-section:hover::before {
        left: 100%;
    }

    /* Table Container */
    .table-container {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--shadow-light);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .table-container:hover::before {
        left: 100%;
    }

    .table-container:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
    }

    /* Modern Table */
    .table-modern {
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        overflow: hidden;
    }

    .table-modern thead th {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        padding: 1.2rem 1.5rem;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        position: relative;
    }

    .table-modern tbody td {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        padding: 1.2rem 1.5rem;
        transition: all 0.3s ease;
        vertical-align: middle;
    }

    .table-modern tbody tr {
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover td {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.01);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .empty-state h4 {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 0.5rem;
    }

    /* Modern Buttons */
    .btn-modern {
        border-radius: 50px;
        padding: 0.7rem 1.8rem;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
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
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .btn-primary-modern {
        background: var(--primary-gradient);
        border: none;
        color: white;
    }

    .btn-primary-modern:hover {
        color: white;
        filter: brightness(1.1);
    }

    .btn-warning-modern {
        background: var(--warning-gradient);
        border: none;
        color: white;
    }

    .btn-warning-modern:hover {
        color: white;
        filter: brightness(1.1);
    }

    .btn-danger-modern {
        background: var(--danger-gradient);
        border: none;
        color: white;
    }

    .btn-danger-modern:hover {
        color: white;
        filter: brightness(1.1);
    }

    /* Small Buttons */
    .btn-sm-modern {
        padding: 0.5rem 1.2rem;
        font-size: 0.8rem;
        border-radius: 25px;
    }

    /* Action Buttons Container */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    /* Header Actions */
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0;
    }

    .header-actions h2 {
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        margin: 0;
        font-size: 1.8rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table-container {
            padding: 1.5rem;
            margin: 1rem;
        }

        .gallery-title {
            font-size: 1.8rem;
        }

        .header-section {
            padding: 1.5rem;
            margin: 1rem;
        }

        .header-actions {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .action-buttons {
            flex-direction: column;
            width: 100%;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
        }

        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
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

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease forwards;
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
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <h2 class="gallery-title animate-fade-in-up">Daftar Kategori</h2>

            @if(session('success'))
                <div class="alert alert-success animate-fade-in-up">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <div class="header-section animate-fade-in-up">
                <div class="header-actions">
                    <h2>
                        <i class="bi bi-folder me-2"></i>
                        Manajemen Kategori
                    </h2>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary-modern btn-modern">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Kategori
                    </a>
                </div>
            </div>

            <div class="table-container animate-fade-in-up">
                @if($categories->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th style="width: 60%">
                                        <i class="bi bi-tag me-2"></i>Nama Kategori
                                    </th>
                                    <th style="width: 40%">
                                        <i class="bi bi-gear me-2"></i>Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $cat)
                                <tr>
                                    <td>
                                        <strong>{{ $cat->name }}</strong>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('categories.edit', $cat) }}"
                                               class="btn btn-warning-modern btn-modern btn-sm-modern">
                                                <i class="bi bi-pencil"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $cat) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin hapus kategori ini?')"
                                                  style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger-modern btn-modern btn-sm-modern">
                                                    <i class="bi bi-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="bi bi-folder-x"></i>
                        <h4>Belum Ada Kategori</h4>
                        <p>Mulai dengan menambahkan kategori pertama Anda</p>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary-modern btn-modern mt-3">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Kategori Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth hover effects to table rows
    const tableRows = document.querySelectorAll('.table-modern tbody tr');

    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });

        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Add confirmation with modern styling
    const deleteButtons = document.querySelectorAll('form[onsubmit*="confirm"] button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const form = this.closest('form');
            const categoryName = this.closest('tr').querySelector('td strong').textContent;

            if (confirm(`Apakah Anda yakin ingin menghapus kategori "${categoryName}"?\n\nTindakan ini tidak dapat dibatalkan.`)) {
                form.submit();
            }
        });
    });

    // Add loading state to action buttons
    const actionButtons = document.querySelectorAll('.action-buttons a, .action-buttons button');

    actionButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (!this.closest('form') || this.closest('form').checkValidity()) {
                this.style.opacity = '0.7';
                this.style.pointerEvents = 'none';

                // Re-enable after 2 seconds (fallback)
                setTimeout(() => {
                    this.style.opacity = '1';
                    this.style.pointerEvents = 'auto';
                }, 2000);
            }
        });
    });
});
</script>
@endpush
@endsection
