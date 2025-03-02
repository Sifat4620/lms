<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laratrust\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {

        $admin =  User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@lms.com',
            'password' => Hash::make('password'), // Or use a secure password
        ]);

        $this->call(LaratrustSeeder::class);

        $admin->addRole(Role::whereName('admin')->first());



        $student =  User::create([
            'username' => 'student',
            'name' => 'Student',
            'email' => 'student@lms.com',
            'password' => Hash::make('password'), // Or use a secure password
        ]);
        $student->addRole(Role::whereName('student')->first());
    }
}
