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

    /**
     * Define the roles relationship.
     * (This is handled by Spatie's HasRoles trait)
     */
    // You can add custom methods for fetching roles or permissions if needed

    /**
     * Define the permissions relationship.
     * (This is handled by Spatie's HasRoles trait)
     */
    public function permissions()
    {
        return $this->belongsToMany(\Spatie\Permission\Models\Permission::class, 'permission_user');
    }

    /**
     * Custom method to check if user has a specific permission (can be used in controllers or elsewhere)
     */
    public function hasPermission($permission)
    {
        return $this->hasPermissionTo($permission);
    }
}
