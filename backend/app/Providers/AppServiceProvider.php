<?php

namespace App\Providers;

use App\Contracts\MediaManager;
use App\Services\MediaManager as ServiceMediaManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MediaManager::class, ServiceMediaManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
