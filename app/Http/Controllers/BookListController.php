<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookListController extends Controller
{
    // Method to show the book list view
    public function index()
    {
        return view('Dashboard.main.book-list');  // Load the view without passing any data
    }
}
