<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory(20)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//            'password' => '12345678910',
//        ]);

        Article::factory(50)->create();
        Article::factory()->create([
            'title' => 'Test title',
            'text' => 'title@example.com',
            'preview_image' => 'image.jpg',
        ]);
    }
}
