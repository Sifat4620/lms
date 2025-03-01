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

        // Check if each book is borrowed
        foreach ($books as $book) {
            $book->is_borrowed = \DB::table('borrowed_books')->where('book_id', $book->id)->exists();
        }

        // Pass the student variable to the view
        return view('Dashboard.main.borrow-book-index', compact('books', 'student'));
    }

    
    
    

    // This method allows the student to borrow a book
    public function borrowBook(Request $request, $bookId)
    {
        // Get the authenticated student
        $student = auth()->user();

        // Check if the student has an active membership
        if (!$student->membership) {
            return redirect()->back()->with('error', 'You need a membership to borrow books.');
        }

        // Find the book by ID
        $book = Book::findOrFail($bookId);

        // Check if the student has already borrowed the book
        if ($student->borrowedBooks()->where('borrowed_books.book_id', $book->id)->exists()) {
            return redirect()->back()->with('error', 'You have already borrowed this book.');
        }

        // Get membership details
        $membership = $student->membership;
        $membershipFeatures = json_decode($membership->features, true);

        // Check the borrowing limit based on membership type
        if ($membership->name === 'Basic') {
            $maxBooks = 3; // Basic members can borrow up to 3 books
            $currentBorrowed = $student->borrowedBooks()->count();

            if ($currentBorrowed >= $maxBooks) {
                return redirect()->back()->with('error', 'You have reached your borrowing limit. Upgrade to Premium for unlimited borrowing.');
            }
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
