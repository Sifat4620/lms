<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Traits\ChecksPermission;
use Illuminate\Support\Facades\Auth; 
class BookController extends Controller
{
    use ChecksPermission;

    // Show book form validation view
    public function showFormValidation()
    {
        return view('Dashboard.main.book-create');
    }

    // Display a list of books
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show form to create a new book
    public function create()
    {
        return view('books.create');
    }

    // Store new book in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string'
        ]);

        Book::create([
            'book_id' => uniqid('BOOK_'), // Auto-generate a unique book ID
            'name' => $request->name,
            'writer' => $request->writer,
            'description' => $request->description,
            'type' => $request->type
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    // Show a specific book
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Update a book's information
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string'
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function edit($id)
    {
        // Retrieve the book by its ID
        $book = Book::findOrFail($id);
        
        // Pass the book data to the book-create view
        return view('Dashboard.main.book-create', compact('book'));
    }


    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    public function payFine(Request $request, $bookId, $fineAmount)
    {
        $user = Auth::user();  // Get the logged-in user
        $book = Book::find($bookId);  // Find the book by ID
    
        // Check if the user has enough balance to pay the fine
        if ($user->balance < $fineAmount) {
            return back()->with('error', 'Insufficient balance. Please deposit more funds.');
        }
    
        // Deduct the fine from the user's balance
        $user->withdraw($fineAmount);  // Assumes the 'withdraw' method is defined on the User model
    
        // Return the book after the fine is paid
        $borrowedBook = $user->borrowedBooks()->where('borrowed_books.book_id', $bookId)->first();
    
        if (!$borrowedBook) {
            return back()->with('error', 'You have not borrowed this book.');
        }
    
        // Detach the book from the student
        $user->borrowedBooks()->detach($bookId);
    
        // Update the book's status to 'available'
        $book->update(['status' => 'available']);
    
        // Redirect with a success message indicating both actions were successful
        return back()->with('success', 'Fine paid and book returned successfully!');
    }
    

}

