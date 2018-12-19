<?php

namespace Tsubasarcs\Privacier;

use Illuminate\Support\ServiceProvider;

class PrivacyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make(PrivacyController::class);

        include(__DIR__ . '/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'Privacier');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
