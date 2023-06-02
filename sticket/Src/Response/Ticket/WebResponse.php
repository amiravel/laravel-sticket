<?php


namespace Sticket\Src\Response\Ticket;


use Sticket\Src\Response\Contracts\ResponseInterface;

class WebResponse implements ResponseInterface
{

    public function success(string $message = 'success!')
    {
        return redirect()
            ->route('tickets.index')
            ->with([
                'message' => $message
            ]);
    }

    public function list($data)
    {
        return view('Sticket::tickets.index', ['tickets' => $data]);
    }

    public function show($data)
    {
        return view('Sticket::tickets.show', ['ticket' => $data]);
    }
}
