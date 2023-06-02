<?php

return [
    'login_route_name' => 'login',

    /**
     * here you can set your own response classes
     * to use them in each entity crud.
     */
    'categories' => [
        'api' => \Sticket\Src\Response\Category\JsonResponse::class,
        'web' => \Sticket\Src\Response\Category\WebResponse::class
    ],

    'tickets' => [
        'api' => \Sticket\Src\Response\Ticket\JsonResponse::class,
        'web' => \Sticket\Src\Response\Ticket\WebResponse::class
    ]
];
