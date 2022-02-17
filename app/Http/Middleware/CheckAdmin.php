<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = null;
        if ($request->bearerToken()) {
            $token = explode('|', $request->bearerToken());
            $tokenId =  $token[0];
            $token = PersonalAccessToken::where('id', $tokenId)->first();
            $user = $token->tokenable;
        }
        if ($user) {
            if (!$user->hasAnyRole(['admin', 'Super Admin'])) {
                return response(
                    [
                        'ok' => false,
                        'message' => __('Unauthorized'),
                        'errors' => []
                    ],
                    Response::HTTP_UNAUTHORIZED
                );
            }
        }
        return $next($request);
    }
}
