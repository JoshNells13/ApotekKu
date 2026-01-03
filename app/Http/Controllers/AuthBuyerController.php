<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthBuyerController extends Controller
{

    public function index()
    {

        return view('auth.LoginBuyer');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')
                ->with('success', 'Login berhasil 🚀');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function create(){

        return view('auth.RegisterBuyer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 🔥 AUTO ROLE BUYER
        $user->assignRole('buyer');

        auth()->login($user);

        return redirect()->route('home')
            ->with('success', 'Register berhasil, selamat datang 🎉');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Logout berhasil 👋');
    }
}
