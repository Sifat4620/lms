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

    // --- Admin Routes (Protected by permissions like 'manage books', 'manage students', etc.) ---
    Route::middleware(['permission:manage books'])->group(function () {
        // Book Routes (Admin-only)
        Route::get('/book-form', [BookController::class, 'showFormValidation'])->name('book.form');
        Route::get('/books', [BookListController::class, 'index'])->name('books.index');
    });

    Route::middleware(['permission:manage students'])->group(function () {
        // Students Routes (Admin-only)
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    });

    Route::middleware(['permission:view reports'])->group(function () {
        // Report Routes (Admin-only)
        Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
    });

    Route::middleware(['permission:manage invoices'])->group(function () {
        // Invoice Routes (Admin-only)
        Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    });

    // --- Student Routes (Protected by 'permission:borrow books') ---
    Route::middleware(['permission:borrow books'])->group(function () {
        // Student profile route
        Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile'); // Changed to profile()

        // Student borrow book route
        Route::get('/student/borrow-book', [StudentController::class, 'borrowBook'])->name('student.borrow.book');
    });
});

// Unauthorized Page (For access denial)
Route::get('/unauthorized', function () {
    return view('errors.unauthorized'); // Create this view to show access denied messages
})->name('unauthorized');
