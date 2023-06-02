<?php


namespace Sticket\Src\Response\Contracts;


interface ResponseInterface
{

    public function success(string $message = 'success!');

    public function list($data);

    public function show($data);
}
