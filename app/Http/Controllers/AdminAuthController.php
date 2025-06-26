<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login'); // sesuaikan nama folder dan file view login
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Cek role, hanya izinkan superadmin dan admin
            $user = Auth::user();
            if (in_array($user->role, ['superadmin', 'admin'])) {
                return redirect()->intended('/admin/dashboard')->with('success', 'Berhasil, Halo ' . Auth::user()->name . '!');
            }

            Auth::logout();

            return back()->with('error', 'Anda tidak memiliki akses ke admin panel.');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
