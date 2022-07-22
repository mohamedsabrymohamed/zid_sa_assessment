<?php


namespace App\Repositories;


class BaseRepository
{

    protected $model;

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @return mixed
     */
    public function list()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }


    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($column, $operator, $value)
    {
        $this->model = $this->model->where($column, $operator, $value);
        return $this;
    }


}
