<?php

namespace App\Providers;

use App\Settings\GeneralSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        try {
            $siteName = app(GeneralSettings::class)->site_name;
        } catch (\Throwable $e) {
            $siteName = config('app.name');
        }

        View::share('siteName', $siteName);
    }
}
