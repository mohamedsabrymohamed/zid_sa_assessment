<?php


namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes);
}
