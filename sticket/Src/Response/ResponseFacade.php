<?php


namespace Sticket\Src\Response;


use Illuminate\Support\Facades\Facade;

abstract class ResponseFacade extends Facade
{

    private const APPLICATION_JSON = 'application/json';

    public static function isApiRequest(){
        return request()->hasHeader('Accept')
            and request()->header('Accept') == self::APPLICATION_JSON;
    }

}
