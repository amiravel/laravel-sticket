<?php


namespace Sticket\Src\Response\Message;


use Sticket\Src\Response\Contracts\ResponseInterface;

class WebResponse implements ResponseInterface
{

    public function success(string $message = 'success!')
    {
        return redirect()->back()
            ->with([
                'message' => $message
            ]);
    }

    public function list($data)
    {
        //
    }


    public function show($data)
    {
        // TODO: Implement show() method.
    }
}
