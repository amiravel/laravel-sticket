<?php


namespace Sticket\Src\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    protected array $filters = [];
    protected array $sorts = [];

    public Request $request;

    public Builder $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        $this->filter();

        $this->sort();

        return $this->builder;
    }

    public function filter()
    {
        foreach ($this->getFilters() as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }
    }

    public function sort()
    {
        if (!empty($this->getSorts())){
            $this->builder->orderBy($this->getSorts(), $this->getSortDirection());
        }
    }

    public function getFilters()
    {
        return $this->request->only($this->filters);
    }

    public function getSorts()
    {
        return $this->request->get('sort');
    }

    public function getSortDirection()
    {
        return $this->request->get('sort_direction', 'asc ');
    }

}
