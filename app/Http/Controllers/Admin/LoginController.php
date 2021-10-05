<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function viewLogin(Request $request) {
        return view('auth.login');
    }   


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // return redirect()->intended('home');
           return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
        Auth::logout();
  
        return redirect()->route('admin.login');
    }
}
