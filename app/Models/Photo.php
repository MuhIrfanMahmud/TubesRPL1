<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'category_id',
        'slug', // tambahkan slug ke fillable
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Membuat slug otomatis saat create dan update
    protected static function booted()
    {
        static::creating(function ($photo) {
            $photo->slug = static::generateUniqueSlug($photo->title);
        });

        static::updating(function ($photo) {
            if ($photo->isDirty('title')) {
                $photo->slug = static::generateUniqueSlug($photo->title);
            }
        });
    }

    // Fungsi untuk membuat slug unik
    protected static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}