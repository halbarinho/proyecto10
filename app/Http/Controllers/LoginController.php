<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //

    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('welcome');
        }
        return view('login');

    }


    public function authenticate(LoginRequest $request): RedirectResponse
    {


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Los datos introducidos no coinciden.',
        ])->onlyInput('email');

    }




}
