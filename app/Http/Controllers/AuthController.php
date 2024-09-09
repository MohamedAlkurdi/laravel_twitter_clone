<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]
        );
        User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect()->route('dashboard')->with('sucess', 'User has been added successfully.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]
        );

        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully.');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'Email and password did not match a registered user.',
        ]);
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully.');;
    }
}
