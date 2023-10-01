<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\RepositorInterface;
use App\Repository\CustomerRepository;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepositorInterface::class,CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
