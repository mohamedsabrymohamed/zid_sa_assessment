<?php

namespace App\Repositories;

use App\Models\Store;
use App\Repositories\Interfaces\StoreRepositoryInterface;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{

    protected $model;

    /**
     * @param Store $store
     */
    public function __construct(Store $store)
    {
        $this->model = $store;
    }

    public function createOrUpdate($attributes)
    {
        return $this->model->updateOrCreate(
            ['user_id' => auth()->id()],
            $attributes
        );
    }


}
