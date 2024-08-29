<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Vérifiez si l'utilisateur est connecté et si c'est un administrateur
        if (Auth::check() && Auth::user()->is_admin != 1) {
            return redirect('/login')->with('error', 'Accès refusé. Vous devez être administrateur.');
        }

        return $next($request);
    }
}
