<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'name', 'writer', 'description', 'type'];


    // / Other methods and properties...

    /**
     * The users who have borrowed this book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function borrowers()
    {
        return $this->belongsToMany(User::class, 'borrowed_books', 'book_id', 'user_id')
                    ->withPivot('borrowed_at', 'due_date')
                    ->withTimestamps();
    }
    
}
