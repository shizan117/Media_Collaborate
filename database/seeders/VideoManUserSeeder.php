<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VideoManUserSeeder extends Seeder
{
    public function run()
    {

        // Path to default image
        $defaultImage = 'images/default.png';

        // Copy default image to storage
        $filePath = 'public/logos/default.png';
        if (!Storage::exists($filePath)) {
            Storage::copy($defaultImage, $filePath);
        }
        User::create([
            'phone' => '22222222',
            'password' => Hash::make('videoman'),
            'name' => 'Video Man',
            'address' => '123 Video Street',
            'photo' => 'logos/default.png', // Path to the stored image
            'role' => 'video_man',
        ]);
    }
}
