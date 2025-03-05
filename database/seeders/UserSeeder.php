<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'christopher',
            'last_name' => 'robbin',
            'phone' => '123456789',
            'expertise' => 'none',
            'experience' => 'none',
            'education' => 'none',
            'linkedIn' => 'none',
            'twitter' => 'none',
            'youTube' => 'none',
            'email' => 'visetech.usa@gmail.com',
            'password' => bcrypt('password123'), // Ensure to hash passwords
            'role' => 'Admin',
        ]);
    }
}
