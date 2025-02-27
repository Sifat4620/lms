<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Call both UserSeeder and RolesAndPermissionsSeeder
        $this->call([
            RolesAndPermissionsSeeder::class,  // Seed roles and permissions
            UserSeeder::class,  // Seed users
        ]);
    }
}
