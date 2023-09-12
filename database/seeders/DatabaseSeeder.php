<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => (new \DateTime)->format('Y-m-d H:i:s'),
            'password' => \Hash::make('admin_password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => (new \DateTime)->format('Y-m-d H:i:s'),
            'password' => \Hash::make('user1_password'),
            'role' => 'user'
        ]);
    }
}
