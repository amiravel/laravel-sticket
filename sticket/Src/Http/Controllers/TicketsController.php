<?php

namespace Sticket\Src\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Sticket\Src\Filters\TicketsFilter;
use Sticket\Src\Repositories\Contracts\TicketRepositoryInterface;
use Sticket\Src\Response\Category\CategoryResponse;
use Sticket\Src\Response\Ticket\TicketResponse;

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

    public function __construct(
        TicketRepositoryInterface $ticketRepository,
        TicketsFilter $filter
    )
    {
        $this->ticketRepository = $ticketRepository;
        $this->filter = $filter;
    }

    public function index(){
        $tickets =  $this->ticketRepository->list($this->filter);

        return TicketResponse::list($tickets);
    }

    public function show(int $id)
    {
        $ticket = $this->ticketRepository->with(['messages', 'user'])->find($id);

        return TicketResponse::show($ticket);
    }
}
