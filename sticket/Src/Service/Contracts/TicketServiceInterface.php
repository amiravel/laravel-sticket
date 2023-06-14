<?php


namespace Sticket\Src\Service\Contracts;


interface TicketServiceInterface
{

    public function userTickets(int $userId);

}
