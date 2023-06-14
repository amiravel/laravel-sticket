<?php


namespace Sticket\Src\Response\Message;


use Sticket\Src\Response\ResponseFacade;

class MessageResponse extends ResponseFacade
{

    protected static function getFacadeAccessor()
    {
        if (static::isApiRequest()){
            return config('sticket.messages.api');
        }
        return config('sticket.messages.web');
    }

}
