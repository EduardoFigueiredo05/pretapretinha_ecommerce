<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Princesas e Sereias', 'macro_theme' => 'Fantasia'],
            ['name' => 'Profissões', 'macro_theme' => 'Dia a Dia'],
            ['name' => 'Orixás e Ancestralidade', 'macro_theme' => 'Cultura e Religião'],
            ['name' => 'Heróis e Heroínas', 'macro_theme' => 'Ação'],
            ['name' => 'Inclusão (PCD, Albinismo, etc)', 'macro_theme' => 'Diversidade']
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'macro_theme' => $category['macro_theme']
            ]);
        }
    }
}