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
        // Fetch the authenticated student
        $student = auth()->user();
    
        // Fetch all books
        $books = Book::all();
    
        // Check if each book is already borrowed or available
        foreach ($books as $book) {
            if ($book->status === 'on_store') {
                $book->availability_status = 'Available';
            } else {
                $book->availability_status = 'Borrowed';
            }
        }
    
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

    
    // This method allows the student to Return a book
    public function returnBook($bookId)
    {
        $student = auth()->user();

        // Use the table alias for clarity
        $book = $student->borrowedBooks()->where('borrowed_books.book_id', $bookId)->first();

        if (!$book) {
            return redirect()->back()->with('error', 'You have not borrowed this book.');
        }

        // Detach book from student
        $student->borrowedBooks()->detach($bookId);

        // Update book status to 'available'
        Book::where('id', $bookId)->update(['status' => 'available']);

        return redirect()->back()->with('success', 'Book returned successfully!');
    }



}
