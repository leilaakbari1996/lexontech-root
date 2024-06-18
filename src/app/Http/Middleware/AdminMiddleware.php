<?php

namespace Lexontech\Root\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lexontech\Root\app\Models\AuthenticationSystem\User;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(getUser()->Type == User::Admin)
        {
            return $next($request);
        }
        abort(404);
    }
}
