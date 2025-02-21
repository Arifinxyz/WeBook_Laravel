<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index($id)
    {
        $genre = Genre::with('books')->findOrFail( $id);
return view('user.genre_book', compact('genre'));
    }
    public function genre_list()
    {
        $genreList = Genre::with('books')->get();

        return view('user.genre', compact('genreList', ));
    }
}
