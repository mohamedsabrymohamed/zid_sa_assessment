<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Resources\StoreResource;
use App\Repositories\StoreRepository;

class StoresController extends Controller
{
    public $storeRepository;

    /**
     * @param StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * @param CreateStoreRequest $request
     * @return StoreResource
     */
    public function store(CreateStoreRequest $request)
    {
       $store = $this->storeRepository->createOrUpdate($request->validated());

        return new StoreResource($store);
    }
}
