<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Store;
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
        $data = $request->validated();

        $data['store_id'] = Store::where('user_id', auth()->id())->first()->id;
        $product = $this->productRepository->create($data);

        return new ProductResource($product);
    }
}
