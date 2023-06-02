<?php


namespace Sticket\Src\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Sticket\Src\Filters\Filter;
use Sticket\Src\Repositories\Contracts\BaseRepositoryInterface;
use \Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository implements BaseRepositoryInterface
{

    protected Model $model;

    public const PER_PAGE = 10;

    public Builder $query;

    public function __construct(Model $model)
    {
        $this->setModel($model);
        $this->setQuery($this->model->newQuery());
    }

    public function create(array $values)
    {
        return $this->query->create($values);
    }

    public function find(int $id)
    {
        return $this->query->find($id);
    }

    public function with(array $relations){
        $this->query->with($relations);

        return $this;
    }

    public function update(int $id, array $values)
    {
        return $this->query->whereId($id)->update($values);
    }

    public function delete(int $id)
    {
        $this->query->whereId($id)->delete();
    }

    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    public function setQuery($query){
        $this->query = $query;
    }

    public function paginate(?int $page = 1)
    {
        return $this->model->newQuery()->paginate(
            self::PER_PAGE,
            ['*'],
            'page',
            $page
        );
    }

    public function list(Filter $filter)
    {
        return $filter->apply($this->model->newQuery())
            ->paginate(
                self::PER_PAGE,
                ['*'],
                'page',
                $filter->request->get('page')
            )
            ->appends($filter->request->all());
    }

    public function first()
    {
        return $this->query->first();
    }
}
