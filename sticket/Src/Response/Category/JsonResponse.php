<?php


namespace Sticket\Src\Response\Category;


use Sticket\Src\Http\Resources\CategoryResource;
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
        return response()->json(CategoryResource::collection($data));
    }

    public function show($data)
    {
        // TODO: Implement show() method.
    }
}
