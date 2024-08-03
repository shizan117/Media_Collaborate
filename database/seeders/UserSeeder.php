<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class UserSeeder extends Seeder
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
            'name' => 'Public Doe',
            'password' => Hash::make('public'),
            'phone' => '00000000',
            'address' => '123 Main St',
            'photo' => 'logos/default.png', // Path to the stored image
            'role'=>'public'
        ]);

        // Create another user
        User::create([
            'name' => 'Public Moye Moye',
            'password' => Hash::make('public'),
            'phone' => '000000001',
            'address' => '456 Elm St',
            'photo' => 'logos/default.png', // Using the same default image
            'role' => 'public'
        ]);

    }
}
