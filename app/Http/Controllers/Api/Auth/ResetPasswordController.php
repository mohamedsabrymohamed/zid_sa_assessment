<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPassword;
use App\Http\Requests\Auth\SendRestPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    /**
     * Send Reset password url with token to user's mail.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResetPasswordMail(SendRestPasswordRequest $request)
    {

        $status = Password::sendResetLink(
            $request->validated()
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)], Response::HTTP_OK)
            : response()->json(['error' => __($status)], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Change user password if has a vaild token.
     *
     * @param ResetPassword $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(ResetPassword $request)
    {
        $status = Password::reset(
            $request->validated(),
            function ($user, $password) use ($request) {
                $user->forceFill(['password' => $password])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? response()->json(['message' => __($status)], Response::HTTP_OK)
            : response()->json(['error' => __($status)], Response::HTTP_BAD_REQUEST);
    }
}
