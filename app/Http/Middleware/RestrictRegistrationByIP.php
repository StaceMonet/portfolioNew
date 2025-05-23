<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictRegistrationByIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $allowedIP = '82.133.2.44'; // Replace with your actual IP

        if ($request->ip() !== $allowedIP) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
