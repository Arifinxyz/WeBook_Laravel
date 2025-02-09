<?php

use App\Http\Controllers\AuthController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::get('/book_desc/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/{id}/content', [BookController::class, 'content']);
Route::get('/login', [AuthController::class, 'form_login'])->name('login');
Route::post('/login?process', [AuthController::class, 'login']);