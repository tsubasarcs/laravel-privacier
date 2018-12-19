<?php

namespace Tsubasarcs\Privacier\Facades;

use Tsubasarcs\Privacier\Services\PrivacyService;
use Illuminate\Support\Facades\Facade;

class Privacier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PrivacyService::class;
    }
}