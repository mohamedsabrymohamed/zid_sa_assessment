<?php

namespace App\Http\Controllers\Api\Auth\Merchant;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Api\Auth\BaseLoginController;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends BaseLoginController
{

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = array_merge($this->credentials($request), ['type' => UserTypeEnum::MERCHANT]);

        $this->jwtToken = JWTAuth::attempt( $credentials );
        return $this->jwtToken;
    }

}
