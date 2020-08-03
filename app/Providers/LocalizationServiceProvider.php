<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Get the first part of the URL.
        $locale = Request::segment(1);

        // Check if locale exists in available_locales from config/app.php and then set app locale.
        if (array_key_exists($locale, config('app.available_locales'))) {
            App::setLocale($locale);
        }

        // Replace the latest locale changed in routes/web.php with the new locale.
        Lang::setLocale(config('app.locale'));
    }
}
