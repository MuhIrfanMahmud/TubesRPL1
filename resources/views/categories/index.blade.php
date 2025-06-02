@extends('layouts.app')

@section('content')
<h2 class="mb-4">Daftar Kategori</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3 text-end">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th style="width: 60%">Nama</th>
            <th style="width: 40%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $cat)
        <tr>
            <td>{{ $cat->name }}</td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center">Belum ada kategori.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection