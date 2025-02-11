<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function form_login()
    {
        return view('auth.login');
    }
    public function form_register()
    {
        return view('auth.register');
    }
   
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'] 
        ]);

        $user = User::Create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user dari sesi
    
        $request->session()->invalidate(); // Hapus sesi yang ada
        $request->session()->regenerateToken(); // Regenerasi token CSRF
    
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}