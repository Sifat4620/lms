<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;  // Correct import
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\AuthManagerController;
use App\Http\Controllers\BookListController;  

// Show login form
Route::get('/login', [AuthManagerController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [AuthManagerController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [AuthManagerController::class, 'logout'])->name('logout');

// Main route: Simply show the login page for unauthenticated users
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes protected by authentication middleware
Route::middleware(['auth'])->group(function () {
    // Index Page Route (Dashboard)
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    
    // Book Routes
    Route::get('/book-form', [BookController::class, 'showFormValidation'])->name('book.form');


    Route::get('/books', [BookListController::class, 'index'])->name('books.index');
    
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    
    // Report Routes
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
    
    // Invoice Routes
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
});
