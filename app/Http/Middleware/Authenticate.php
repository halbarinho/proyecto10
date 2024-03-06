<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * Undocumented class
 */
class Authenticate extends Middleware


    /**
     * Renombrada ka clase para evitar conflictos con la otra clase Auth usada por ejemplo en el logout
     */
    // class AuthMiddleware10 extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
