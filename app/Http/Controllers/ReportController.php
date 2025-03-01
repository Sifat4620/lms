<?php

namespace App\Http\Controllers;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // ReportController.php
    public function index(Request $request)
    {
        \Log::info('Request Params:', $request->all()); // Log all request parameters

        $borrowedBooks = BorrowedBook::with('book', 'user')->orderBy('borrowed_at', 'desc');

        if ($request->filled('borrow_date')) {
            $borrowedBooks = $borrowedBooks->whereDate('borrowed_at', '=', $request->borrow_date);
            \Log::info('Filtering by date: ' . $request->borrow_date);
        }

        if ($request->filled('status') && $request->status == 'need_to_order') {
            $borrowedBooks = $borrowedBooks->where('due_date', '<', now());
            \Log::info('Filtering for Need to Order');
        }

        $borrowedBooks = $borrowedBooks->get();
        \Log::info('Filtered Count: ' . $borrowedBooks->count());

        return view('Dashboard.main.report-list', compact('borrowedBooks'));
    }

}
