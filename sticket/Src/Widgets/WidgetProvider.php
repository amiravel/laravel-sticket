<?php


namespace Sticket\Src\Widgets;


class WidgetProvider
{

    /**
     * @var string[]
     */
    private static $widgets = [
        Categories::class,
        Priorities::class
    ];

    public static function boot(){
        foreach (self::$widgets as $widget){
            app($widget)->render();
        }
    }

}
