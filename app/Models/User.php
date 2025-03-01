<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements LaratrustUser
{
    use HasFactory, Notifiable,HasRolesAndPermissions; // Include Spatie's HasRoles trait to handle roles & permissions

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
     * The books that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function borrowedBooks(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'borrowed_books')
                    ->withPivot('borrowed_at', 'due_date')
                    ->withTimestamps();
    }
    public function membership()
    {
        return $this->belongsTo(\App\Models\Membership::class);
    }
}
