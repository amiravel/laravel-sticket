<?php

namespace Sticket\Src\Http\Controllers;

use Illuminate\Routing\Controller;
use Sticket\Src\Http\Requests\NewMessageRequest;
use Sticket\Src\Repositories\Contracts\MessageRepositoryInterface;
use Sticket\Src\Response\Message\MessageResponse;

class MessagesController extends Controller
{

    /**
     * @var MessageRepositoryInterface
     */
    private MessageRepositoryInterface $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }


    public function store(NewMessageRequest $request, int $ticketId)
    {
        $this->messageRepository->create([
            'user_id' => auth()->id() ?? 1,
            'ticket_id' => $ticketId,
            'content' => $request->get('content')
        ]);

        return MessageResponse::success();
    }

    public function destroy(int $id)
    {
        $this->messageRepository->delete($id);

        return MessageResponse::success();
    }
}
