<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Nature',
            'Architecture',
            'Travel',
            'Portrait',
            'Street',
            'Abstract',
            'Wildlife',
            'Macro'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
