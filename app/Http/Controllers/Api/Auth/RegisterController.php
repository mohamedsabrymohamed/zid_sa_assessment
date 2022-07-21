<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRegister;
use App\Http\Resources\User\LoginResource;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @param AuthRegister $request
     * @return LoginResource
     */
    public function register(AuthRegister $request, UserRepository $userRepository)
    {
        event(new Registered($user = $userRepository->create( $request->validated() )));
        return new LoginResource(JWTAuth::fromUser($user), $user );
    }

}
