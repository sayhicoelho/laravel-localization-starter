<?php

use Illuminate\Support\Facades\Route;
use App\Support\Lang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

foreach (config('app.available_locales') as $locale => $data) {
    // Set the default locale to avoid passing $locale argument to every Lang::getRoute.
    Lang::setLocale($locale);

    // Remove prefix if defaults
    $prefix = $locale == config('app.fallback_locale') ? '' : $locale;

    // Define the main route group that passes generated prefix and prefixes all route names with the locale.
    Route::prefix($prefix)->name("{$locale}.")->group(function () {
        Route::get('/', 'WelcomeController@index')
            ->name('welcome');

        // We need to pass Lang::getRoute('name') on every route or prefix group to translate the URL path.
        Route::prefix(Lang::getRoute('example'))->group(function () {
            Route::get('{id}', 'WelcomeController@example')
                ->name('example');
        });
    });
}
