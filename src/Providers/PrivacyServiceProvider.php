<?php

namespace Tsubasarcs\Privacier\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PrivacyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../database/migrations/' => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__ . '/../../config/privacy.php' => config_path('privacy.php'),
            ], 'config');
        }

        if (config('privacy.service_providers.routes')) {
            $path = config('privacy.service_providers.path');
            Route::group([
                'namespace' => 'Tsubasarcs\Privacier\Http\Controllers',
                'middleware' => 'web',
                'prefix' => $path,
                'as' => $path . '.',
            ], function () {
                Route::post('/store', 'PrivacyController@store')->name('store');
                Route::post('/set/cookie', 'PrivacyController@setCookie')->name('set_cookie');
            });
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/privacy.php', 'privacy');
    }
}
