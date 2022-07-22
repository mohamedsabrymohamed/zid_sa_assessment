<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Http\Resources\CartResource;
use App\Repositories\CartRepository;
use App\Services\Cart\CartCalculationService;
use Illuminate\Http\Response;

class CartsController extends Controller
{
    public $cartRepository;
    public $cartCalculationService;
    public function __construct(CartRepository $cartRepository, CartCalculationService $cartCalculationService)
    {
        $this->cartRepository = $cartRepository;
        $this->cartCalculationService = $cartCalculationService;
    }
    public function add(AddToCartRequest $request)
    {
        $cart = $this->cartRepository->addToCart($request->validated(), auth()->id() );
        return response([],Response::HTTP_NO_CONTENT);
    }

    public function get()
    {
        $cart = $this->cartCalculationService->exec(auth()->id());
        return new CartResource($cart);
    }
}
