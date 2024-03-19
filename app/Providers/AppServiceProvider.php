<?php

namespace App\Providers;

use App\Repositories\Eloquent\EventRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Local\OrderRepository as LocalOrderRepository;
use App\Services\Queries\EventService;
use App\Services\Queries\OrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(EventService::class, function ($app) {
            return new EventService($app->make(EventRepositoryInterface::class));
        });

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderService::class, function ($app) {
            return new OrderService($app->make(OrderRepositoryInterface::class), $app->make(LocalOrderRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
