<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create only ONE settings record
        Settings::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Houy',
                'email' => 'info@houy.com',
                'phone' => '+855 12 345 678',
                'facebook' => 'https://facebook.com/houy',
                'telegram' => 'https://t.me/houy',
                'instagram' => 'https://instagram.com/houy',
                'youtube' => 'https://youtube.com/houy',
                'description' => 'Welcome to Houy - Your trusted platform for quality content.',
                'logo' => null,
            ]
        );

        // Create admin user if doesn't exist
        User::firstOrCreate(
            ['email' => 'admin@houy.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'), // Change this in production!
            ]
        );
    }
}