<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DataFavoritController;

Route::get('/', [BookController::class, 'index'])->name('book.index');

Route::get('/book_desc/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/{id}/content', [BookController::class, 'content']);

Route::get('/login', [AuthController::class, 'form_login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'form_register'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/add-favorit', [DataFavoritController::class, 'add_favorit'])->name('favorit.add');
Route::delete('/delete-favorit', [DataFavoritController::class, 'delete_favorit'])->name('favorit.delete');
