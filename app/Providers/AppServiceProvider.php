<?php

namespace App\Providers;

use App\Models\Footer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $footerData = Cache::remember('footer_data', 60 * 60, function () {
                return Footer::first();
            });

            $view->with('footerData', $footerData);
        });
    }
}
