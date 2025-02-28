<?php

namespace App\Http\Controllers;
use App\Models\BorrowedBook;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Fetch the borrowing report data
        $borrowedBooks = BorrowedBook::with('book', 'user') // Eager load related models
            ->orderBy('borrowed_at', 'desc') // Optional: Order by borrowed date
            ->get();

        // Pass the data to the view
        return view('Dashboard.main.report-list', compact('borrowedBooks'));
    }
}
