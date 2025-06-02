@extends('layouts.app')

@section('content')
<h2 class="mb-4">Edit Kategori</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection