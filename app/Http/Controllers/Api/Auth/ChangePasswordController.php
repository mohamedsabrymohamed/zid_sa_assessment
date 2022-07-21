<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $newPassword = $request->validated()['password'];
            auth()->user()->update(['password' => $newPassword]);
            return response()->json(null, Response::HTTP_CREATED);

        } catch (\Exception $exception) {
            return response()->json(['error' => 'invalid'], Response::HTTP_BAD_REQUEST);
        }

    }
}
