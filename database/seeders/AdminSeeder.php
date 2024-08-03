<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminSeeder extends Seeder
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
            'name' => 'Admin Doe',
            'password' => Hash::make('admin'),
            'phone' => '11111111',
            'address' => '123 Main St',
            'photo' => 'logos/default.png', // Path to the stored image
            'role'=>'admin'
        ]);

    }
}
