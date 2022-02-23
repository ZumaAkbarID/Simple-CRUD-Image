<?php

namespace Database\Seeders;

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

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => null,
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Member',
            'username' => 'member',
            'email' => 'member@email.com',
            'email_verified_at' => null,
            'role' => 'member',
            'password' => bcrypt('password')
        ]);
    }
}