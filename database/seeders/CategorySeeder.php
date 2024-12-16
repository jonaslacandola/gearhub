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
            ['name' => 'Fasteners'],
            ['name' => 'Power Tools'],
            ['name' => 'Hand Tools'],
            ['name' => 'Varnishes and Paints'],
            ['name' => 'Building Materials'],
            ['name' => 'Supplies'],
            ['name' => 'Safety Equipment'],
        ]);
    }
}
