@extends('layouts.app')

@section('content')
<h2 class="gallery-title mb-4">Edit Foto</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('photos.update', $photo) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label fw-semibold">Judul Foto</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $photo->title) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == old('category_id', $photo->category_id) ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Ganti Gambar (opsional)</label>
        <input type="file" name="image" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        <div class="mt-3">
            <p><strong>Gambar Saat Ini:</strong></p>
            <img src="{{ asset('storage/'.$photo->image_path) }}" class="img-thumbnail" width="200">
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
        <button class="btn btn-success">
            <i class="bi bi-save me-1"></i> Simpan Perubahan
        </button>
    </div>
</form>
@endsection