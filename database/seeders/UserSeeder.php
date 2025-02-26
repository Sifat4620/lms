<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Remove existing user with 'admin' username (if it exists)
        User::where('username', 'admin')->delete();

        // Now create the admin user
        User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'password' => bcrypt('password'), // Or use a secure password
        ]);
    }
}
