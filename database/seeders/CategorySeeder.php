<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Str sınıfını eklemeyi unutmayın
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Eğlence', 'Bilişim', 'Spor', 'Teknoloji', 'Spor', 'Günlük Yaşam'];
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
