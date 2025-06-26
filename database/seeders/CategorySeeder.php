<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Kampus'],
            ['name' => 'Teknologi'],
            ['name' => 'Kegiatan'],
            ['name' => 'UkM'],
            ['name' => 'Birokrasi'],
            ['name' => 'Lainnya'],
        ]);
    }
}
