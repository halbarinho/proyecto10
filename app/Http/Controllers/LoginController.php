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
        // return redirect()->route('loginShow');
    }


    public function authenticate(LoginRequest $request): RedirectResponse
    {
        //Validar datos
// $credentials = $request->getCredentials();

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();



            // return request();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Los datos introducidos no coinciden.',
        ])->onlyInput('email');

    }


    //Añado el metodo para controlar LOGOUT
    // public function logout(Request $request)
    // {

    //     Auth::logout();

    //     //Resetear la sesion para evitar problemas
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect(route('login'));
    // }

}
