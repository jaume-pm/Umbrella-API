<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan; 
use App\Http\Controllers\ConcertController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
{
    $this->app->bind(ConcertController::class, function ($app) {
        return new ConcertController();
    });
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()){
            // Call update discounts on boot
            Artisan::call('concert:update-discounts');
        }
    }
}
