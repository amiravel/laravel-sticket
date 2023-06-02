<?php


namespace Sticket\Src\Response\Ticket;


use Sticket\Src\Http\Resources\CategoryResource;
use Sticket\Src\Http\Resources\TicketResource;
use Sticket\Src\Response\Contracts\ResponseInterface;

class JsonResponse implements ResponseInterface
{

    public function success(string $message = 'success!')
    {
        return response()->json([
            'message' => $message
        ]);
    }

    public function list($data)
    {
        return response()->json(TicketResource::collection($data));
    }

    public function show($data)
    {
        return new TicketResource($data);
    }

}
