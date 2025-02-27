<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {

        $user =  User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@lms.com',
            'password' => Hash::make('password'), // Or use a secure password
        ]);
        $user->assignRole('admin');


        $user =  User::create([
            'username' => 'student',
            'name' => 'Student',
            'email' => 'student@lms.com',
            'password' => Hash::make('password'), // Or use a secure password
        ]);
        $user->assignRole('student');
    }
}
