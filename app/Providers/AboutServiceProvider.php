<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\RepositorInterface;
use App\Repository\AboutRepository;

class AboutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $this->app->bind(RepositorInterface::class,AboutRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
