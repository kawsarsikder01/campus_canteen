<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\RepositorInterface;
use App\Repository\TableRepository;

class TableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepositorInterface::class,TableRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
