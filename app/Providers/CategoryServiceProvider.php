<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\RepositorInterface;
use App\Repository\CategoryRepository;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepositorInterface::class,CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
