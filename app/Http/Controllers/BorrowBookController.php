<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class BorrowBookController extends Controller
{
    public function index()
    {
        // Fetch all books from the database (you can filter this based on your requirements)
        $books = Book::where('status', 'on_store')->get(); // assuming status indicates available books

        // Return the index view with the books data
        return view('Dashboard.main.borrow-book-index', compact('books'));
    }

    // This method allows the student to borrow a book
    public function borrowBook(Request $request, $bookId)
    {
        // Get the authenticated student
        $student = auth()->user();

        // Find the book by ID
        $book = Book::findOrFail($bookId);

        // Check if the student has already borrowed the book
        // Fix the ambiguity issue by using table alias
        if ($student->borrowedBooks()->where('borrowed_books.book_id', $book->id)->exists()) {
            return redirect()->back()->with('error', 'You have already borrowed this book.');
        }

        // Borrow the book: add entry in the pivot table 'borrowed_books'
        $dueDate = \Carbon\Carbon::now()->addWeeks(2); // Set due date as two weeks from now

        $student->borrowedBooks()->attach($book->id, [
            'borrowed_at' => \Carbon\Carbon::now(),
            'due_date' => $dueDate,
        ]);

        // Optionally, update the book's status to 'borrowed'
        $book->update(['status' => 'borrowed']);

        return redirect()->back()->with('success', 'You have successfully borrowed the book!');
    }

}
