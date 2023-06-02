<?php


namespace Sticket\Src\Response\Category;


use Sticket\Src\Response\ResponseFacade;

class CategoryResponse extends ResponseFacade
{

    protected static function getFacadeAccessor()
    {
        if (static::isApiRequest()){
            return config('sticket.categories.api');
        }
        return config('sticket.categories.web');
    }


}
