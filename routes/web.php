<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\AuthManagerController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BorrowBookController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\FineController;


// Show login form
Route::get('/login', [AuthManagerController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [AuthManagerController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [AuthManagerController::class, 'logout'])->name('logout');

// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Handle registration form submission
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Main route: Simply show the login page for unauthenticated users
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes protected by authentication middleware
Route::middleware(['auth'])->group(function () {

    // Index Page Route (Dashboard) - Accessible by both admin and student
    Route::get('/index', [IndexController::class, 'index'])->name('index');

        Route::get('/book-form', [BookController::class, 'showFormValidation'])->name('book.form')->middleware(['permission:manage_books-view']);


        Route::middleware('auth')->get('/student/borrow-books', [BorrowBookController::class, 'index'])->name('borrow.books');

        // Borrow a book
        Route::middleware('auth')->post('/student/borrow/{bookId}', [BorrowBookController::class, 'borrowBook'])->name('borrow.book');
      
        Route::resource('books', BookController::class);

        Route::get('/books', [BookListController::class, 'index'])->name('books.index')->middleware(['permission:manage_books-view']);

        // In routes/web.php

        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

        Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware(['permission:manage_students-view']);


        Route::get('/reports', [ReportController::class, 'index'])->name('report.index')->middleware(['permission:view_reports-view']);

        Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index')->middleware(['permission:view_reports-view']);


        Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile'); // Changed to profile()

        // Student borrow book route
        Route::get('/student/borrow-book', [StudentController::class, 'borrowBook'])->name('student.borrow.book');
       
        Route::post('/books/return/{book}', [BorrowBookController::class, 'returnBook'])->name('books.return');


        Route::get('/upgrade', [MembershipController::class, 'showUpgradePage'])->name('upgrade');
        
        Route::post('/upgrade', [MembershipController::class, 'upgrade'])->name('upgrade.post');
        
        // Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');


        Route::post('/wallet/deposit', [WalletController::class, 'deposit'])->name('wallet.deposit');

        Route::post('books/payFine/{bookId}/{fineAmount}', [BookController::class, 'payFine'])->name('books.payFine');



});

// Unauthorized Page (For access denial)
Route::get('/unauthorized', function () {
    return view('errors.unauthorized'); // Create this view to show access denied messages
})->name('unauthorized');
