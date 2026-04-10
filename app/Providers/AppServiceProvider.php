<?php

namespace App\Providers;

use App\Repositories\Interfaces\PagesRepositoryInterface;
use App\Repositories\PagesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PagesRepositoryInterface::class, PagesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
