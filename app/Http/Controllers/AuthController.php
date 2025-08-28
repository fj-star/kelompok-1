<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user_id', Auth::user()->id);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Login gagal, periksa kembali email dan password.'
        ])->onlyInput('email');
    }
    
    // --- Tambahan untuk Registrasi ---
    
    /**
     * Tampilkan halaman registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.registrasi');
    }

    /**
     * Tangani proses registrasi pengguna baru.
     */
    public function register(Request $request)
    {
        // 1. Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // 2. Buat pengguna baru di database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // 3. Login otomatis setelah registrasi
        Auth::login($user);

        // 4. Arahkan pengguna ke halaman dashboard
        return redirect()->route('dashboard');
    }

    // --- Akhir Tambahan ---

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}