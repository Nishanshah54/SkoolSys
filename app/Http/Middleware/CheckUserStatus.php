<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (Auth::check() && !in_array(Auth::user()->status, [0, 1])) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Your account is inactive or blocked.',
            ]);
        }

        return $next($request);
    }
}
