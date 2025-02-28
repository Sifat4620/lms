<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    // Method to show the book list view
    public function index()
    {   
        $books = Book::all();
        return view('Dashboard.main.book-list',compact('books')); 
    }
}
