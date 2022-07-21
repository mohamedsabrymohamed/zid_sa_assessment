<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * @var
     */
    protected $token;

    /**
     * @var User
     */
    protected $user;

    /**
     * LoginResource constructor.
     * @param $token
     * @param User $user
     */
    public function __construct($token, User $user)
    {
        $this->token    = $token;
        $this->user     = $user;
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user'          => new UserResource($this->user),
            'access_token'  => $this->token,
            'token_type'    => 'bearer',
        ];
    }
}
