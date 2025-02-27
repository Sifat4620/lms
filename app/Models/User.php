<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Include Spatie's HasRoles trait to handle roles & permissions

    // Define the columns that are mass-assignable
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    // Define the columns that are hidden for security
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define the columns that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
