<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    // 🖼️ Menampilkan galeri foto
    public function index(Request $request)
    {
        $query = Photo::with('category');

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category Filter
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Sorting
        switch ($request->sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default:
                $query->latest();
        }

        $photos = $query->paginate(12)->withQueryString();
        $categories = Category::withCount('photos')->get();

        return view('photos.index', compact('photos', 'categories'));
    }

    // 🆕 Form upload
    public function create()
    {
        $categories = Category::all();
        return view('photos.create', compact('categories'));
    }

    // 💾 Simpan foto baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id'
        ]);

        $path = $request->file('image')->store('photos', 'public');

        Photo::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'image_path' => $path,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('photos.index')->with('success', 'Foto berhasil diupload.');
    }

    // 🖊️ Form edit foto
    public function edit(Photo $photo)
    {
        $categories = Category::all();
        return view('photos.edit', compact('photo', 'categories'));
    }

    // 🛠️ Simpan update
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'category_id' => $request->category_id
        ];

        // Jika gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($photo->image_path);
            $data['image_path'] = $request->file('image')->store('photos', 'public');
        }

        $photo->update($data);

        return redirect()->route('photos.index')->with('success', 'Foto berhasil diperbarui.');
    }

    // 🗑️ Hapus foto
    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Foto berhasil dihapus.');
    }

    // 🔍 Tampilkan detail berdasarkan slug
    public function show($slug)
    {
        $photo = Photo::where('slug', $slug)->firstOrFail();
        return view('photos.show', compact('photo'));
    }
}
