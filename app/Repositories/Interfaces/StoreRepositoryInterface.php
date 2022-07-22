<?php


namespace App\Repositories\Interfaces;


interface StoreRepositoryInterface
{
    /**
     * @param $attributes
     * @return mixed
     */
    public function createOrUpdate($attributes);
}
