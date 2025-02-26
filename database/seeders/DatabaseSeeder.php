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
        // You can call other seeders here, for example:
        $this->call(UserSeeder::class); // If you have a UserSeeder
    }
}
