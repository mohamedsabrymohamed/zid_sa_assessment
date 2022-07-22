<?php

namespace App\Services\Cart;
use App\Repositories\CartRepository;

class CartCalculationService
{

    public $cartRepository;

    /**
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * @param $authId
     * @return mixed
     */
    public function exec($authId)
    {
        $cart = $this->cartRepository->get($authId);
        $subTotal = 0;
        $vat = 0;
        foreach ($cart->items as $item) {
            $vatIncluded = $item->product->vat_included;
            $subTotal += $item->product->price * $item->qty;
            if (!$vatIncluded) {
                $vat += ($item->product->price * $item->qty * $item->product->store->vat) / 100;
            }
        }
        $cart->sub_total = $subTotal;
        $cart->total = $subTotal + $vat;
        return $cart;
    }

}
