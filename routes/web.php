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
    Lang::setLocale($locale);

    $prefix = $locale == config('app.fallback_locale') ? '' : $locale;

    Route::prefix($prefix)->name("{$locale}.")->group(function () {
        Route::get('/', 'WelcomeController@index')
            ->name('welcome');

        Route::prefix(Lang::getRoute('example'))->group(function () {
            Route::get('{id}', 'WelcomeController@example')
                ->name('example');
        });
    });
}
