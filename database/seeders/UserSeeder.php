<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laratrust\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create or get the admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@lms.com'],
            [
                'username' => 'admin',
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Ensure the 'admin' role exists and assign it only if the user doesn't already have it
        $adminRole = Role::whereName('admin')->first();
        if ($adminRole && !$admin->hasRole('admin')) {
            $admin->addRole($adminRole);
        }

        // Create or get the student user
        $student = User::firstOrCreate(
            ['email' => 'student@lms.com'],
            [
                'username' => 'student',
                'name' => 'Student',
                'password' => Hash::make('password'),
            ]
        );

        // Ensure the 'student' role exists and assign it only if the user doesn't already have it
        $studentRole = Role::whereName('student')->first();
        if ($studentRole && !$student->hasRole('student')) {
            $student->addRole($studentRole);
        }

        // Optionally, you can call the LaratrustSeeder to create roles (if it's not done already)
        $this->call(LaratrustSeeder::class);
    }
}
