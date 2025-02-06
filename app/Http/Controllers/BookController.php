<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home',[ 'books' => $books]);
    }
    public function show($id)
{
    $book = Book::findOrFail($id);
    return view('book.book_desc', compact('book'));
}
    
    public function content($id)
    {
        $book = Book::findOrFail($id);
        $pdfUrl = $book->content;
        return view('book.book_content', compact('book', 'pdfUrl'));
    }
    
}

