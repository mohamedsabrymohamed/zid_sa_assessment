<?php


namespace App\Repositories;


class BaseRepository
{

    protected $model;

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function list()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }


    public function where($column, $operator, $value)
    {
        $this->model = $this->model->where($column, $operator, $value);
        return $this;
    }


}
