<?php


namespace App\Repositories\Interfaces;


interface StoreRepositoryInterface
{
    public function createOrUpdate($attributes);
}
