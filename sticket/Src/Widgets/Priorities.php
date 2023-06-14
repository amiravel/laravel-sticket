<?php


namespace Sticket\Src\Widgets;


use Illuminate\Support\Facades\Blade;
use Sticket\Src\Widgets\Contract\WidgetInterface;
use Sticket\Src\Enums\TicketPriority;

class Priorities implements WidgetInterface
{


    public function render()
    {
        Blade::directive('priorities', function () {
            return view('Sticket::widgets.priorities', [
                'priorities' => TicketPriority::cases()
            ]);
        });
    }

}
