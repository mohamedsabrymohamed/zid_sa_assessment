<?php


namespace App\Repositories\Interfaces;


interface CartRepositoryInterface
{
    /**
     * @param $attributes
     * @param $userId
     * @return mixed
     */
    public function addToCart($attributes, $userId);
}
