<?php


namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface
{
    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes);
}
