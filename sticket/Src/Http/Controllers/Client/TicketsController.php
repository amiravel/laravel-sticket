<?php

namespace Sticket\Src\Http\Controllers\Client;

use Illuminate\Routing\Controller;
use Sticket\Src\Filters\TicketsFilter;
use Sticket\Src\Repositories\Contracts\TicketRepositoryInterface;
use Sticket\Src\Response\Ticket\TicketResponse;
use Sticket\Src\Service\Contracts\TicketServiceInterface;

class TicketsController extends Controller
{

    /**
     * @var TicketRepositoryInterface
     */
    private TicketRepositoryInterface $ticketRepository;

    /**
     * @var TicketsFilter
     */
    private TicketsFilter $filter;

    /**
     * @var TicketServiceInterface
     */
    private TicketServiceInterface $ticketService;


    public function __construct(
        TicketServiceInterface $ticketService,
        TicketRepositoryInterface $ticketRepository
    )
    {
        $this->ticketService = $ticketService;
        $this->ticketRepository = $ticketRepository;
    }

    public function index()
    {
        $tickets = $this->ticketService->userTickets(auth()->id() ?? 1);

        return TicketResponse::list($tickets);
    }

    public function create(){
        return view('Sticket::client.tickets.create');
    }

    public function show(int $id)
    {
        $ticket = $this->ticketRepository->with(['messages', 'user'])->find($id);

        return TicketResponse::show($ticket);
    }
}
