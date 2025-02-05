<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::get('/book_desc/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/book_content/{id}', [BookController::class, 'content'])->name('book.book_content');