<?php

namespace Sticket\Src\Enums;

use function Nette\Utils\match;

enum TicketPriority: string {

    case URGENT = 'urgent';
    case HIGH = 'high';
    case MEDIUM = 'medium';
    case LOW = 'low';

    public static function getOrder(self $value){
        return match($value){
            TicketPriority::URGENT => 4,
            TicketPriority::HIGH => 3,
            TicketPriority::MEDIUM => 2,
            TicketPriority::LOW => 1,
        };
    }

    public static function getOrderValue($value){
        return match($value){
            4 => 'urgent',
            3 => 'high',
            2 => 'medium',
            1 => 'low',
        };
    }

//    public static function

    public function order(){
        return self::getOrder($this);
    }

    public static function getColor($priority){
        return match($priority){
            TicketPriority::URGENT => 'bg-danger',
            TicketPriority::HIGH => 'bg-warning',
            TicketPriority::MEDIUM => 'bg-info',
            TicketPriority::LOW => 'bg-success',
        };
    }

    public function color(){
        return TicketPriority::getColor($this);
    }

}
