<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Http\Resources\CartResource;
use App\Repositories\CartRepository;

class CartsController extends Controller
{
    public $cartRepository;
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }
    public function add(AddToCartRequest $request)
    {
        $cart = $this->cartRepository->addToCart($request->validated(), auth()->id() );
        return new CartResource($cart);
    }
}
