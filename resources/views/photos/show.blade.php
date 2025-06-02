@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <img src="{{ asset('storage/'.$photo->image_path) }}" class="card-img-top" style="max-height:400px; object-fit:cover;">
    <div class="card-body">
        <h3>{{ $photo->title }}</h3>
        <p><strong>Kategori:</strong> {{ $photo->category->name ?? '-' }}</p>
        <a href="{{ asset('storage/' . $photo->image_path) }}" download class="btn btn-outline-primary">Download</a>
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">Kembali ke Galeri</a>
    </div>
</div>
@endsection