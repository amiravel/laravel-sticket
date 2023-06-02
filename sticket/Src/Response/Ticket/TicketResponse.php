<?php


namespace Sticket\Src\Response\Ticket;


use Sticket\Src\Response\ResponseFacade;

class TicketResponse extends ResponseFacade
{

    public static function getFacadeAccessor()
    {
        if (static::isApiRequest()){
            return config('sticket.tickets.api');
        }
        return config('sticket.tickets.web');
    }

}
