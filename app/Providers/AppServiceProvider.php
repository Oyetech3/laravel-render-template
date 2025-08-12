<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if (config('app.env') === 'production' || env('FORCE_HTTPS')) {
            URL::forceScheme('https');
            URL::forceRootUrl(env('APP_URL'));
        }
        Log::info('Memory usage at boot: ' . round(memory_get_usage() / 1024 / 1024, 2) . ' MB');
    }
}
