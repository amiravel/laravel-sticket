<?php


namespace Sticket\Src\Repositories;


use Sticket\Src\Filters\TicketsFilter;
use Sticket\Src\Models\Ticket;
use Sticket\Src\Repositories\Contracts\TicketRepositoryInterface;

class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{

    public function __construct(Ticket $model)
    {
        parent::__construct($model);
    }


    public function userTickets(int $userId)
    {
        $this->query->where('user_id', $userId);
        return $this->list();
    }


}
