<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    //

    public function forgetPassword()
    {
        return view('forget-Password');
    }

    public function forgetPasswordPost(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            // ? back()->with(['status' => __($status)])
            ? redirect()->route('welcome')->with(['status', 'Profile updated!'])

            : back()->withErrors(['email' => __($status)]);

    }


    public function resetPassword(string $token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    // 'password' => Hash::make($password)
                    'password' => $password //Quito la funcion de encriptado, porque si no se realizaría un doble encriptado que no dejaría acceder a traves del login
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
