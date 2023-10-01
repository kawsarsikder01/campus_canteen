<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\RepositorInterface;
use App\Repository\SliderRepository;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepositorInterface::class,SliderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
