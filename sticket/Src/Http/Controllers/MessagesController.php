<?php

namespace Sticket\Src\Http\Controllers;

use Illuminate\Routing\Controller;
use Sticket\Src\Http\Requests\NewCategoryRequest;
use Sticket\Src\Http\Requests\UpdateCategoryRequest;
use Sticket\Src\Repositories\Contracts\CategoryRepositoryInterface;
use Sticket\Src\Response\Category\CategoryResponse;

class MessagesController extends Controller
{

    /**
     * @var CategoryRepositoryInterface
     */
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(request('page'));

//        return CategoryResponse::list($categories);
        return CategoryResponse::list($categories);
//        return view('Sticket::categories.index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('Sticket::categories.create');
    }

    public function store(NewCategoryRequest $request)
    {
        $this->categoryRepository->create($request->validated());

        return CategoryResponse::success();
    }

    public function edit(int $id)
    {
        $category = $this->categoryRepository->find($id);

        return view('Sticket::categories.edit', ['category' => $category]);
    }

    public function update(int $id, UpdateCategoryRequest $request)
    {
        $this->categoryRepository->update($id, $request->only('name'));

        return CategoryResponse::success();
    }

    public function destroy(int $id)
    {
        $this->categoryRepository->delete($id);

        return CategoryResponse::success();
    }
}
