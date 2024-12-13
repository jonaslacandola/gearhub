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
        Category::insert([
            ['category' => 'Fasteners'],
            ['category' => 'Power Tools'],
            ['category' => 'Hand Tools'],
            ['category' => 'Varnishes and Paints'],
            ['category' => 'Building Materials'],
            ['category' => 'Supplies'],
            ['category' => 'Safety Equipment'],
        ]);
    }
}
