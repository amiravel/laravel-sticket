<?php

namespace Sticket;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Sticket\Src\Behaviors\Categories\ApiCanNotSeeWebForms;
use Sticket\Src\Behaviors\Categories\CheckAcceptHeaderExists;
use Sticket\Src\Behaviors\Categories\StoreCategory;
use Sticket\Src\Repositories\CategoryRepository;
use Sticket\Src\Repositories\Contracts\CategoryRepositoryInterface;
use Sticket\Src\Repositories\Contracts\TicketRepositoryInterface;
use Sticket\Src\Repositories\TicketRepository;
use Illuminate\Pagination\Paginator;

class SticketServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadDirectories();
        $this->loadFeatures();
        $this->bindings();
        $this->useBootstrapUi();
    }

    private function loadDirectories()
    {
        Route::prefix('api')->group(__DIR__ .'/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/Src/Database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views/', 'Sticket');
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'sticket');
    }

    private function bindings()
    {
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

    }

    public function loadFeatures(){
//        StoreCategory::checkRequest('categories.store');
        ApiCanNotSeeWebForms::handle(['categories.create', 'categories.edit']);
    }

    public function useBootstrapUi()
    {
        Paginator::useBootstrap();
    }

}
