<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\DataFavorit;
use App\Models\DataHistory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        $genres = Genre::with('books')->get();

        if (Request::is('/')) {
            return view('home', compact('books', 'genres'));
        } elseif (Request::is('book')) {
            return view('user.book', compact('books', 'genres'));
        }
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
            $history = DataHistory::where('user_id', auth()->id())
                ->where('book_id', $id)
                ->first();
    
            if ($history) {
                $history->touch(); // Update the updated_at timestamp
            } else {
                DataHistory::create([
                    'user_id' => auth()->id(),
                    'book_id' => $id
                ]);
            }
        }
       
        $exist = DataFavorit::where('user_id', auth()->id())
        ->where('book_id', $id)
        ->exists();
        $book = Book::findOrFail($id);
        $pdfUrl = $book->content;
        return view('book.book_content', compact('book', 'pdfUrl', 'exist'));
    }

    public function search(Request $request)
{
    $query = request()->input('query');
    $books = Book::where('tittle', 'LIKE', "%{$query}%")
        ->orWhere('author', 'LIKE', "%{$query}%")
        ->get();

    return view('user.book_search', compact('books', 'query'));
}
    
}


