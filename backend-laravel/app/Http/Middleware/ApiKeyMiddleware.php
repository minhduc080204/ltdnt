<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          $apiToken = $request->header('api-key');
          if ($apiToken !== env('API_KEY')) {
              return response()->json(['error' => 'Unauthorized'], 401);
          }
          return $next($request);
    }
}
