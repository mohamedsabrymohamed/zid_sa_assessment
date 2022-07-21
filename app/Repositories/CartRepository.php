<?php

namespace App\Repositories;


use App\Models\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{

    protected $model;


    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }

    protected function firstOrCreate($userId)
    {
        return $this->model->firstOrCreate(
            ['user_id' => $userId]
        );
    }

    public function addToCart($attributes, $userId)
    {
        $cart = $this->firstOrCreate($userId);
        $cart->items()->create($attributes);
        return $cart->load('items');
    }

}
