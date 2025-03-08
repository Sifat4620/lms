<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Traits\ChecksPermission;

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
}
