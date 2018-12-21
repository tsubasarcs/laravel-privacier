<?php

namespace Tsubasarcs\Privacier\Tests;

use Orchestra\Testbench\TestCase as LaravelTestCase;

class TestCase extends LaravelTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__ . '/../database/migrations'),
        ]);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/../src';
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            \Tsubasarcs\Privacier\Providers\PrivacyServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Privacier' => \Tsubasarcs\Privacier\Facades\Privacier::class,
        ];
    }
}