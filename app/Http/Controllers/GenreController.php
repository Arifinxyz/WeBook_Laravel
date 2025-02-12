<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public Function book_genre()
    {
        $book_genres = Genre::all();
        return view('home', ['book_genres' => $book_genres]);
    }
}
