<?php

namespace App\Http\Controllers\Api\Auth;

use App\Enums\UserTypeEnum;
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
    public function clientRegister(AuthRegister $request, UserRepository $userRepository)
    {
        $data = $request->validated();
        $data['type'] = UserTypeEnum::CLIENT;
        event(new Registered($user = $userRepository->create( $data )));
        return new LoginResource(JWTAuth::fromUser($user), $user );
    }

    public function merchantRegister(AuthRegister $request, UserRepository $userRepository)
    {
        $data = $request->validated();
        $data['type'] = UserTypeEnum::MERCHANT;
        event(new Registered($user = $userRepository->create( $data )));
        return new LoginResource(JWTAuth::fromUser($user), $user );
    }

}
