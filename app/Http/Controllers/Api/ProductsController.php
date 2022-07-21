<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{
     public $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function store(CreateProductRequest $request)
    {
       $product = $this->productRepository->create($request->validated());

        return new ProductResource($product);
    }
}
