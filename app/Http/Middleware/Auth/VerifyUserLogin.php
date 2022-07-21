<?php

namespace App\Http\Middleware\Auth;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerifyUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        $typeId = UserTypeEnum::getIdByType($type);
        if (auth()->user() && auth()->user()->type !== $typeId) {
            return response()->json(['error' => 'Permission denied'], Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
