<?php

namespace App\Providers;

use App\Http\Modules\Tickets\Interfaces\TicketRepositoryInterface;
use App\Http\Modules\Tickets\Interfaces\TicketServiceInterface;
use App\Http\Modules\Tickets\Repositories\TicketRepository;
use App\Http\Modules\Tickets\Services\TicketService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
        $this->app->bind(TicketServiceInterface::class, TicketService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
