<?php


namespace Sticket\Src\Response\Category;


use Sticket\Src\Response\Contracts\ResponseInterface;

class WebResponse implements ResponseInterface
{

    public function success(string $message = 'success!')
    {
        return redirect()
            ->route('categories.index')
            ->with([
                'message' => $message
            ]);
    }

    public function list($data)
    {
        return view('Sticket::categories.index', ['categories' => $data]);
    }


    public function show($data)
    {
        // TODO: Implement show() method.
    }
}
