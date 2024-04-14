<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pack;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name' => 'Mohamed Sahraoui',
            'email' => 'admin@email.com',
            'password' => '$2y$10$.W8XGabrkfHzqZjXaK7psObBhAcquUkNKXsSoaCS9hPTwpPGxZcyu',
            'isAdmin' => 'SI',
        ]); //  create a user named Mohamed sahraoui with admin privileges

        User::factory(20)->create();
        Storage::deleteDirectory('packs');
        Storage::makeDirectory('packs');
        Pack::factory(10)->create();
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        Post::factory(20)->create();
    }
}
