<?php

use App\Http\Controllers\AuthController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

Route::get('/', [BookController::class, 'index'], [GenreController::class, 'book_genre'])->name('book.index');
Route::get('/book_desc/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/{id}/content', [BookController::class, 'content']);

Route::get('/login', [AuthController::class, 'form_login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'form_register'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/logout', [AuthController::class, 'logout']);