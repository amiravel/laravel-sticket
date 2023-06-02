<?php


namespace Sticket\Src\Repositories;



use Sticket\Src\Models\Category;
use Sticket\Src\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

}
