<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function form_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        Log::info('Attempting login with credentials:', $credentials);

        // Debugging: Periksa apakah pengguna ditemukan
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            Log::info('User found:', ['email' => $user->email]);
        } else {
            Log::warning('User not found:', ['email' => $credentials['email']]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Log::info('Login successful for user:', ['email' => $request->email]);
            return redirect()->intended('/');
        }

        Log::warning('Login failed for user:', ['email' => $request->email]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}