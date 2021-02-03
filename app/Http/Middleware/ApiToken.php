<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        $token_test = User::where('api_token', $token)->first();

        if ($token_test) {
            return response()->json([
                'success' => false,
                'data' => 'Token Error'
            ]);
        }

        return $next($request);
    }
}
