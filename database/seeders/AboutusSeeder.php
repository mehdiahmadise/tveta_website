<?php

namespace Database\Seeders;

use App\Models\Aboutus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutus::create([
            'language' => 'english',
            'title' => 'Something',
            'content' => 'Something',
            'image' => 'image.png'
        ]);
    }
}
