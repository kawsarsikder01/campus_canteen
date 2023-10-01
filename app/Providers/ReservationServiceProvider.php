<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\ReservationInterface;
use App\Repository\ReservationRepository;

class ReservationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ReservationInterface::class,ReservationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
