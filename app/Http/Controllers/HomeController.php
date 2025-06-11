<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $photos = Photo::with('category')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::withCount('photos')
            ->orderBy('photos_count', 'desc')
            ->take(6)
            ->get();

        $totalPhotos = Photo::count();
        $totalCategories = Category::count();

        return view('home', compact('photos', 'categories', 'totalPhotos', 'totalCategories'));
    }
}
