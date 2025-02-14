<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the users table with 'username' column
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('username')->unique(); // User's username (unique)
            $table->string('name'); // User's name (if you need a separate name field)
            $table->string('password'); // User's password (hashed)
            $table->timestamps(); // created_at and updated_at
        });

        // Automatically create an admin account
        DB::table('users')->insert([
            'username' => 'admin', // Set username as 'admin'
            'name' => 'Admin', // Set the name of the admin
            'password' => Hash::make('123456'), // Hash the password for security
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'users' table if rolled back
        Schema::dropIfExists('users');
    }
}
