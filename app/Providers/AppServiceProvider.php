<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Barryvdh\DomPDF\Facade as PDF; // Import PDF facade
use Barryvdh\DomPDF\ServiceProvider as DomPDFServiceProvider; // Import DomPDF Service Provider

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Register DomPDF service provider
        $this->app->register(DomPDFServiceProvider::class);
        
        // Register PDF alias
        $this->app->alias('PDF', PDF::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if (config('app.env') !== 'local') {
            \URL::forceScheme('https');
    }
}
