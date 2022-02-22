<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function loginView()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('Auth.login', $data);
    }

    public function registerView()
    {
        $data = [
            'title' => 'Register'
        ];

        return view('Auth.register', $data);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:4',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return back()->withInput()->with('error', 'Account not found!');
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'username' => 'required|alpha_dash|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'avatar' => 'required|image|file|max:1024',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $validated['avatar'] = $request->file('avatar')->store('img-avatar');
        $validated['password'] = bcrypt($validated['password']);

        $register = User::create($validated);
        if ($register) {
            return redirect('/login')->with('success', 'Account successfully registered');
        } else {
            return redirect('/login')->with('error', 'Failed to register');
        }
    }

    public function logout()
    {
        Session()->invalidate();
        Auth::logout();
        return redirect('/login')->with('success', 'Successfull logout');
    }
}
