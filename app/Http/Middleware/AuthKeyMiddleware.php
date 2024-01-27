<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'authkey' is present in the request headers or query parameters
        $authKey = $request->header('authkey') ?? $request->query('authkey');

        // Replace 'YOUR_SECRET_KEY' with your actual secret key
        $validKey = 'YOUR_SECRET_KEY';

        if ($authKey !== $validKey) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
