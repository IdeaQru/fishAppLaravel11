<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; // Pastikan ini sesuai dengan lokasi file User model Anda
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register'); // mengasumsikan view Anda berada di dalam folder pages dan bernama dashboard.blade.php
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name', // Memastikan nama unik
            'email' => 'required|string|email|max:255|unique:users,email', // Memastikan email unik
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Kode untuk membuat user dan lain-lain

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('login');
    }
}
