<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class activeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        if ($user->acode === null || $user->stats === 'notactive' || !$user->approved) {
            return redirect('/notactive');
        }

        if ($user->stats === 'active') {
            return $next($request);
        }
        if ($user->stats === 'owner') {
            return $next($request);
        }

        return abort(403, 'Unauthorized action');
    }
}
