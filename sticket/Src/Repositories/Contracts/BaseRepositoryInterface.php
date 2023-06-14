<?php


namespace Sticket\Src\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;
use Sticket\Src\Filters\Filter;

interface BaseRepositoryInterface
{
    public function setModel(Model $model);

    public function create(array $values);

    public function find(int $id);

    public function update(int $id, array $values);

    public function delete(int $id);

    public function paginate(int $page = 1);

    public function list();

    public function with(array $relations);

    public function first();

    public function setFilter(Filter $filter);

    public function all();
}
