<?php


namespace Sticket\Src\Service;


use Sticket\Src\Filters\TicketsFilter;
use Sticket\Src\Repositories\Contracts\TicketRepositoryInterface;
use Sticket\Src\Service\Contracts\TicketServiceInterface;

class TicketService implements TicketServiceInterface
{

    /**
     * @var TicketRepositoryInterface
     */
    private TicketRepositoryInterface $ticketRepository;
    /**
     * @var TicketsFilter
     */
    private TicketsFilter $filter;

    public function __construct(TicketRepositoryInterface $ticketRepository, TicketsFilter $filter)
    {
        $this->ticketRepository = $ticketRepository;

        $this->filter = $filter;
    }

    public function userTickets(int $userId)
    {
        return $this->ticketRepository
            ->setFilter($this->filter)
            ->userTickets($userId);
    }

}
