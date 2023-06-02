<?php


namespace Sticket\Src\Filters;


class TicketsFilter extends Filter
{

    protected array $filters = [
        'category',
//        'agent',
//        'user'
    ];

    public function category(int $id){
        $this->builder->where('category_id', $id);
    }

}
