<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define the columns that are mass-assignable
    protected $fillable = [
        'username',  // Add 'username' here
        'name',
        'email',
        'password',
    ];

    // Define the columns that are hidden
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define the columns that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Optionally, if you need custom query scopes, you can define them here.
}
