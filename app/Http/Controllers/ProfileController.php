<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\DataFavorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $filename = time() . '.jpg';

            // Simpan gambar di storage
            Storage::disk('public')->put('img/user_profile/' . $filename, file_get_contents($image));

            // Simpan ke database
            $user = Auth::user();
            $user->profile_pic = $filename;
            $user->save();

            return response()->json(['success' => true, 'profile_pic' => $filename]);
        }

        return response()->json(['success' => false], 400);
    }

    public function show_favorit(Request $request)
    {
        // Mengambil data favorit pengguna dengan informasi buku terkait
        $dataFavorit = DataFavorit::with('book')->where('user_id', auth()->id())->get();
    
        // Mengirim data ke view 'profile'
        return view('profile', compact('dataFavorit'));
    }
    
}
