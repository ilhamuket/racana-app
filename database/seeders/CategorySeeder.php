<?php

namespace Database\Seeders;

use App\Models\TmRefCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Define your seed data here
       $categories = [
        ['name' => 'Program Kerja', 'slug' => 'program-kerja','status' => '1'],
        ['name' => 'Informasi', 'slug' => 'informasi','status' => '1'],
        ['name' => 'Kegiatan Luar Racana', 'slug' => 'kegiatan-luar-racana','status' => '1'],
        ['name' => 'Kegiatan Racana', 'slug' => 'kegiatan-racana','status' => '1'],
        ['name' => 'Permainan', 'slug' => 'permainan','status' => '1'],
        // Add more seed data as needed
        ];

        // Seed the data into the TmRefCategory model
        foreach ($categories as $category) {
            TmRefCategory::create($category);
        }
    }
}
