<?php

namespace App\Http\Controllers;

use App\Models\DataFavorit;
use Illuminate\Http\Request;

class DataFavoritController extends Controller
{
    public function add_favorit(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'
        ]);

        DataFavorit::create($validatedData);

        return back()->with('success', 'Buku berhasil ditambahkan ke favorit');
    }
    public function delete_favorit(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:data_favorits,book_id'
        ]);

        DataFavorit::where('user_id', auth()->id())->where('book_id', $request->book_id)->delete();
        return back()->with('success', 'Buku berhasil dihapus dari favorit');
    }
    
    public function show_favorit(Request $request)
    {
        // Mengambil data favorit pengguna dengan informasi buku terkait
        $dataFavorit = DataFavorit::with('book')->where('user_id', auth()->id())->get();
    
        // Mengirim data ke view 'profile'
        return view('user.favorite', compact('dataFavorit'));
    }
~
}
