<?php


namespace Sticket\Src\Widgets;


use Illuminate\Support\Facades\Blade;
use Sticket\Src\Repositories\Contracts\CategoryRepositoryInterface;
use Sticket\Src\Widgets\Contract\WidgetInterface;

class Categories implements WidgetInterface
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function render()
    {
        Blade::directive('categories', function (){
            return view('Sticket::widgets.categories', [
                'categories' => $this->categoryRepository->all()
            ]);
        });

    }

}
