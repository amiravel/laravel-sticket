<?php


namespace Sticket\Src\Enums;


use function Nette\Utils\match;

enum TicketStatus: string
{
    case WAITING = 'waiting';
    case RESPONSED = 'responsed';
    case CLOSED = 'closed';
    case OPEN = 'open';

    public function color(){
        return self::getColor($this);
    }

    public static function getColor($status){
        return match($status){
            TicketStatus::OPEN => 'bg-success',
            TicketStatus::WAITING => 'bg-warning',
            TicketStatus::RESPONSED => 'bg-info',
            TicketStatus::CLOSED => 'bg-danger',

        };
    }

}
