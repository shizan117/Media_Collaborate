<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(VideoManUserSeeder::class);
        $this->call(VideoEditorUserSeeder::class);
    }

}
