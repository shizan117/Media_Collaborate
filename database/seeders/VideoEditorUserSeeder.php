<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VideoEditorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
            'phone' => '33333333',
            'password' => Hash::make('videoeditor'),
            'name' => 'Video Editor',
            'address' => '123 Video Street',
            'photo' => 'logos/default.png', // Path to the stored image
            'role' => 'video_editor',
        ]);
    }
}
