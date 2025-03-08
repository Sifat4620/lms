<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index() 
   {
       // Fetch the total number of books
       $totalBooks = Book::count();

       // Fetch the number of borrowed books
       $borrowedBooks = BorrowedBook::count();

       // Fetch the number of books that are not borrowed (in stock)
       $inStockBooks = Book::whereNotIn('id', BorrowedBook::pluck('book_id'))->count();

       // Calculate progress percentages
       $borrowedPercentage = ($totalBooks > 0) ? ($borrowedBooks / $totalBooks) * 100 : 0;
       $inStockPercentage = ($totalBooks > 0) ? ($inStockBooks / $totalBooks) * 100 : 0;

       // Return view with dynamic data
       return view('Dashboard.main.index', compact('totalBooks', 'borrowedBooks', 'inStockBooks', 'borrowedPercentage', 'inStockPercentage'));
   }
}
