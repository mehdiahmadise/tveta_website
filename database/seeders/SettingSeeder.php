<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'logo' => 'logo.png',
            'language' => 'english',
            'phone_number' => '07823412',
            'phone_number2' => '07823456',
            'email' => 'mehdi@gamil.com',
            'footer_description' => 'something',
            'address' => 'something',
            'face_book_url' => 'something',
            'linkedin_url' => 'something',
            'twitter_url' => 'something',
            'instagram_url' => 'something',
            'youtube_url' => 'something',
            'banner' => 'banner.png'
            
        ]);
    }
}
