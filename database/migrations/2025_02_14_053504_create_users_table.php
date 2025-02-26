<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('username')->unique(); // Unique Username
            $table->string('name'); // Full Name
            $table->string('password'); // Hashed Password
            $table->rememberToken(); // Token for session-based authentication
            $table->string('api_token', 80)->nullable()->unique(); // Token for API authentication (Optional)
            $table->timestamps(); // created_at & updated_at
        });

        // Insert default admin user with token
        DB::table('users')->insert([
            'username' => 'admin', 
            'name' => 'Admin', 
            'password' => Hash::make('Admin@123'), // Secure Password
            'api_token' => Str::random(60), // Generate a random API token
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
        Schema::dropIfExists('users');
    }
}
