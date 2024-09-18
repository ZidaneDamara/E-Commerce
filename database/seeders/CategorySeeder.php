<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "category_name"=> "Formal",
        ]);
        Category::create([
            "category_name"=> "Non Formal",
        ]);
        Category::create([
            "category_name"=> "Casual",
        ]);
        Category::create([
            "category_name"=> "Hypebeast",
        ]);
        Category::create([
            "category_name"=> "Coat",
        ]);
        Category::create([
            "category_name"=> "Overcoat",
        ]);
    }
}