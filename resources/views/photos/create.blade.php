  <!-- create.blade.php -->

@extends('layouts.app')

@section('title', 'Upload Foto Baru')

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

    /* Form Container */
    .form-container {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: var(--shadow-light);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .form-container:hover::before {
        left: 100%;
    }

    .form-container:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
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
    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(220, 53, 69, 0.3);
        border-radius: 15px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.2rem;
    }

    /* Form Controls */
    .form-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        color: white;
        padding: 1rem 1.2rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
        color: white;
        transform: translateY(-2px);
    }

    .form-select option {
        background: #2c3e50;
        color: white;
    }

    /* File Input Styling */
    .file-input-container {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
    }

    .form-control[type="file"] {
        position: relative;
        z-index: 2;
        opacity: 0;
        cursor: pointer;
    }

    .file-input-label {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.1);
        border: 2px dashed rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.8);
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 2rem;
        min-height: 120px;
    }

    .file-input-label:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.5);
        transform: scale(1.02);
    }

    .file-input-label i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Modern Buttons */
    .btn-modern {
        border-radius: 50px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
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

    .btn-secondary-modern {
        background: rgba(108, 117, 125, 0.2);
        border: 1px solid rgba(108, 117, 125, 0.4);
        color: rgba(255, 255, 255, 0.9);
    }

    .btn-secondary-modern:hover {
        background: rgba(108, 117, 125, 0.4);
        color: white;
    }

    .btn-success-modern {
        background: var(--success-gradient);
        border: none;
        color: white;
    }

    .btn-success-modern:hover {
        color: white;
        filter: brightness(1.1);
    }

    /* Form Group Spacing */
    .mb-3 {
        margin-bottom: 2rem !important;
    }

    /* Button Container */
    .button-container {
        margin-top: 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    /* Loading States */
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        display: none;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        z-index: 1000;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-text {
        color: white;
        margin-top: 1rem;
        font-weight: 500;
    }

    /* File Preview */
    .file-preview {
        display: none;
        margin-top: 1rem;
        text-align: center;
    }

    .file-preview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .file-preview-name {
        color: rgba(255, 255, 255, 0.8);
        margin-top: 0.5rem;
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 1.5rem;
            margin: 1rem;
        }

        .gallery-title {
            font-size: 1.8rem;
        }

        .button-container {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
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
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <h2 class="gallery-title animate-fade-in-up">Upload Foto Baru</h2>

            @if ($errors->any())
                <div class="alert alert-danger animate-fade-in-up">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container animate-fade-in-up">
                <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-card-text me-2"></i>Judul Foto
                        </label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               placeholder="Masukkan judul foto yang menarik..."
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-folder me-2"></i>Kategori
                        </label>
                        <select name="category_id" class="form-select" required>
                            <option disabled selected>-- Pilih Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="bi bi-cloud-upload me-2"></i>Gambar
                        </label>
                        <div class="file-input-container">
                            <input type="file"
                                   name="image"
                                   class="form-control"
                                   accept="image/*"
                                   id="imageInput"
                                   required>
                            <label for="imageInput" class="file-input-label">
                                <i class="bi bi-cloud-upload"></i>
                                <div>Klik untuk memilih gambar</div>
                                <small>atau drag & drop file disini</small>
                                <small class="text-muted mt-1">Format: JPG, PNG, GIF (Max: 2MB)</small>
                            </label>
                        </div>
                        <div class="file-preview" id="filePreview">
                            <img id="previewImage" src="" alt="Preview">
                            <div class="file-preview-name" id="fileName"></div>
                        </div>
                    </div>

                    <div class="button-container">
                        <a href="{{ route('photos.index') }}" class="btn btn-secondary-modern btn-modern">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success-modern btn-modern" id="submitBtn">
                            <i class="bi bi-check-circle"></i>
                            Simpan Foto
                        </button>
                    </div>

                    <!-- Loading Overlay -->
                    <div class="loading-overlay" id="loadingOverlay">
                        <div class="text-center">
                            <div class="loading-spinner"></div>
                            <div class="loading-text">Mengupload foto...</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('imageInput');
    const filePreview = document.getElementById('filePreview');
    const previewImage = document.getElementById('previewImage');
    const fileName = document.getElementById('fileName');
    const uploadForm = document.getElementById('uploadForm');
    const loadingOverlay = document.getElementById('loadingOverlay');
    const submitBtn = document.getElementById('submitBtn');

    // File preview functionality
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Check file size (2MB limit)
            if (file.size > 2 * 1024 * 1024) {
                alert('File terlalu besar! Maksimal 2MB');
                this.value = '';
                filePreview.style.display = 'none';
                return;
            }

            // Check file type
            if (!file.type.startsWith('image/')) {
                alert('File harus berupa gambar!');
                this.value = '';
                filePreview.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                fileName.textContent = file.name;
                filePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            filePreview.style.display = 'none';
        }
    });

    // Drag and drop functionality
    const fileInputLabel = document.querySelector('.file-input-label');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        fileInputLabel.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        fileInputLabel.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        fileInputLabel.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        fileInputLabel.style.background = 'rgba(255, 255, 255, 0.2)';
        fileInputLabel.style.transform = 'scale(1.05)';
    }

    function unhighlight(e) {
        fileInputLabel.style.background = 'rgba(255, 255, 255, 0.1)';
        fileInputLabel.style.transform = 'scale(1)';
    }

    fileInputLabel.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            imageInput.files = files;
            const event = new Event('change', { bubbles: true });
            imageInput.dispatchEvent(event);
        }
    }

    // Form submission with loading
    uploadForm.addEventListener('submit', function(e) {
        // Show loading overlay
        loadingOverlay.style.display = 'flex';
        submitBtn.disabled = true;

        // Optional: Add timeout for very long uploads
        setTimeout(function() {
            if (loadingOverlay.style.display === 'flex') {
                loadingOverlay.style.display = 'none';
                submitBtn.disabled = false;
                alert('Upload memakan waktu lama. Silakan coba lagi.');
            }
        }, 30000); // 30 seconds timeout
    });

    // Real-time validation
    const titleInput = document.querySelector('input[name="title"]');
    const categorySelect = document.querySelector('select[name="category_id"]');

    function validateForm() {
        const isValid = titleInput.value.trim() !== '' &&
                        categorySelect.value !== '' &&
                        imageInput.files.length > 0;

        submitBtn.disabled = !isValid;

        if (isValid) {
            submitBtn.classList.add('animate-pulse');
        } else {
            submitBtn.classList.remove('animate-pulse');
        }
    }

    titleInput.addEventListener('input', validateForm);
    categorySelect.addEventListener('change', validateForm);
    imageInput.addEventListener('change', validateForm);

    // Initial validation
    validateForm();
});
</script>
@endpush
@endsection
