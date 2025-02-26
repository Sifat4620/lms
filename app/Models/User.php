<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;  // Add this

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Add HasRoles trait to use Spatie's role and permission system

    // Define the columns that are mass-assignable
    protected $fillable = [
        'username', 
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
