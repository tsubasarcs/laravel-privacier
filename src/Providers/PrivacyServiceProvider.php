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

        if (config('privacy.setup_store_routes')) {
            $path = config('privacy.path');
            Route::group([
                'namespace' => 'Components\Privacy\Http\Controllers',
                'middleware' => 'web',
                'prefix' => $path,
                'as' => 'local_packages.' . $path . '.',
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
