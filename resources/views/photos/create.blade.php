@extends('layouts.app')

@section('content')
<h2 class="gallery-title mb-4">Upload Foto Baru</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0">
    @csrf
    <div class="mb-3">
        <label class="form-label fw-semibold">Judul Foto</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Kategori</label>
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
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="image" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
        <button class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Simpan
        </button>
    </div>
</form>
@endsection