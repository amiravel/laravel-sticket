<?php


namespace Sticket\Src\Behaviors\Categories;


use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

class ApiCanNotSeeWebForms
{

    public static function handle(array $routes)
    {
        Event::listen(function (RouteMatched $event) use ($routes) {
            if (
                Str::contains($event->route->getPrefix(), 'api' )
                and ($event->request->header('Accept') != 'application/json' or !$event->request->hasHeader('Accept'))
//                and in_array($event->route->getName(), $routes)
            ) {
                return response(['message' => 'please set Accept in request headers'], 404)->throwResponse();
            }
        });
    }

}
