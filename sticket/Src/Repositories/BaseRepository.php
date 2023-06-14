<?php


namespace Sticket\Src\Repositories;


use http\Exception\InvalidArgumentException;
use Illuminate\Contracts\Container\BindingResolutionException;
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

    public Filter $filter;

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

    public function with(array $relations)
    {
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

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function paginate(?int $page = 1)
    {
        return $this->query->paginate(
            self::PER_PAGE,
            ['*'],
            'page',
            $page
        );
    }

    public function list()
    {
        throw_if(empty($this->filter), BindingResolutionException::class,  'filter property not initialized');

        return $this->filter->apply($this->query)
            ->paginate(
                self::PER_PAGE,
                ['*'],
                'page',
                $this->filter->request->get('page')
            )
            ->appends($this->filter->request->all());
    }

    public function first()
    {
        return $this->query->first();
    }

    public function setFilter(Filter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    public function all()
    {
        return $this->query->get();
    }

}
