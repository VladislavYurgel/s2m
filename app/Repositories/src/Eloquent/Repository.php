<?php

namespace Repositories\Eloquent;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Repositories\Contracts\RepositoryInterface;
use Repositories\Exceptions\RepositoryException;

abstract class Repository implements RepositoryInterface {

    private $app;

    protected $model;

    public function __construct(Container $app) {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    public function makeModel() {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    public function all($columns = array('*')) {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*')) {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update(array $data, $id) {
        return $this->model->update($data);
    }

    public function delete($id) {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*')) {
        return $this->model->where($field, '=', $value)->first($columns);
    }
}