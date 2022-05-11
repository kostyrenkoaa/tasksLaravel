<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $model;

    abstract public function getModelClass(): string;

    public function getNewModel() {
        $modelClass = $this->getModelClass();
        return new $modelClass();
    }

    public function getModel(): Model
    {
        if (empty($this->model)) {
            $this->model = $this->getNewModel();
        }

        return $this->model;
    }

    public function getById($id, $columns = ['*'])
    {
        return $this->getBuilder()
            ->find($id, $columns);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->getModel()->newQuery();
    }

    public function save(Model $model)
    {
        return $model->save();
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function insert($data)
    {
        $this->getBuilder()->insert($data);
    }
}
