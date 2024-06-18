<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUserByNameOrEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt(['email' => $credentials['login'], 'password' => $credentials['password']])) {
            return $next($request);
        }

        if (Auth::attempt(['name' => $credentials['login'], 'password' => $credentials['password']])) {
            return $next($request);
        }

        return redirect()->back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
