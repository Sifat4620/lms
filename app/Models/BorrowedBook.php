<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BorrowedBook extends Model
{
    use HasFactory;

    // Table name (if necessary)
    protected $table = 'borrowed_books';

    // Define the relationships
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cast the borrowed_at and due_date to Carbon instances
    protected $casts = [
        'borrowed_at' => 'datetime',
        'due_date' => 'datetime',
    ];

    // Fillable fields (optional)
    protected $fillable = ['user_id', 'book_id', 'borrowed_at', 'due_date'];
}
