<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\DataFavorit;
use App\Models\DataHistory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        $genres = Genre::with('books')->get();
        return view('home', compact('books', 'genres'));
    }
    
    public function show($id)
{
    $exist = DataFavorit::where('user_id', auth()->id())
    ->where('book_id', $id)
    ->exists();

    $book = Book::with('genres')->findOrFail($id);
    $listbook = Book::orderBy('created_at', 'desc')->get();

    return view('book.book_desc', compact('book', 'exist', 'listbook'));
}
    
    public function content($id)
    {   

        if (auth()->id()) {
            DataHistory::create([
                'user_id' => auth()->id(),
                'book_id' => $id
            ]);
        }
       

        $book = Book::findOrFail($id);
        $pdfUrl = $book->content;
        return view('book.book_content', compact('book', 'pdfUrl'));
    }
    
}


