<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function loginproses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:3|max:100',
            'password' => 'required'

        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return redirect('/');
    }

    public function register()
    {
        return view('login.register');
    }

    public function registeruser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
