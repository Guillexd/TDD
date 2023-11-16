<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $time = isset($request->time) ? 2 : 1;
        // $time = now()->minute;
        if($time % 2 === 0) {
            return response()->json(['errors' => 'Time is wrong'], 400);
        }
        return $next($request);
    }
}
