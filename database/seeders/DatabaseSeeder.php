<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@simpultemu.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Sample user
        User::create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $this->call([
            ThemeSeeder::class,
            MusicSeeder::class,
        ]);
    }
}
