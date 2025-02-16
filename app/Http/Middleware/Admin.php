<?php

namespace App\Http\Middleware; // Diperbaiki dari App\Http

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') { // Diperbaiki
            return $next($request);
        }
        abort(401);
    }
}