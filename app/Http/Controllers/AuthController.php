<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('pages.index');
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            // if role is admin
            if (auth()->user()->role == 1) {
                return redirect()->route('tools.index');
            }
            // if role is user
            return redirect()->route('pages.index');
        }

        return redirect()->route('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
    }
}
