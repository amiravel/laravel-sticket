<?php


namespace Sticket\Src\Repositories;



use Sticket\Src\Models\Message;
use Sticket\Src\Repositories\Contracts\MessageRepositoryInterface;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{

    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

}
