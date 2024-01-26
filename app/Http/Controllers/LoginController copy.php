<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

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


    public function login(LoginRequest $request)
    {
        //Validar datos

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::validate($credentials)) {
            return redirect()->to('login')->withErrors('auth.failed');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        //$request->session()->regenerate();

        return $this->authenticated($request, $user);

    }

    public function authenticated(Request $request, $user)
    {
        //AQUI A LO MEJOR NO ES NECESARIO EL IF
        return redirect()->intended('/welcome');



    }

}
