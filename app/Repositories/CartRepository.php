<?php

namespace App\Repositories;


use App\Models\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{

    protected $model;


    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }

    /**
     * @param $userId
     * @return mixed
     */
    protected function firstOrCreate($userId)
    {
        return $this->model->firstOrCreate(
            ['user_id' => $userId]
        );
    }

    /**
     * @param $attributes
     * @param $userId
     * @return mixed|void
     */
    public function addToCart($attributes, $userId)
    {
        $cart = $this->firstOrCreate($userId);
        $cart->items()->updateOrCreate(
            ['product_id' => $attributes['product_id']],
            ['qty'        => $attributes['qty']]
        );
    }

    /**
     * @param $authId
     * @return mixed
     */
    public function get($authId)
    {
        return $this->model->where('user_id' , $authId)->with(['items.product.store'])->first();
    }
}
