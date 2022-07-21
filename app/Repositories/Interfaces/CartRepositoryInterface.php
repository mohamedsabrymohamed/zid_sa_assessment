<?php


namespace App\Repositories\Interfaces;


interface CartRepositoryInterface
{
    public function addToCart($attributes, $userId);
}
