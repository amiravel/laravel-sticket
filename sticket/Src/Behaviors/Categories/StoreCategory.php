<?php

namespace Sticket\Src\Behaviors\Categories;

use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class StoreCategory{

    public static function checkRequest($route){
        Event::listen(function(RouteMatched $event) use ($route){

            if(Str::is($route, $event->route->getName())){
                $event->request->validate([
                    'name' => ['required', 'unique:categories,name'],
                ]);
            }

        });
    }

}
