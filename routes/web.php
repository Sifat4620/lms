<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;

// Route::post('/', [IndexController::class, 'login'])->name('login');
Route::get('/index', [IndexController::class, 'index'])->name('index');// Book Routes
Route::get('/book-form', [BookController::class, 'create'])->name('book.form');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Report Routes
Route::get('/reports', [ReportController::class, 'index'])->name('report.index');


// Invoice Routes
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');