# laravel-privacier
<a href="https://packagist.org/packages/tsubasarcs/laravel-privacier"><img src="https://poser.pugx.org/tsubasarcs/laravel-privacier/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/tsubasarcs/laravel-privacier"><img src="https://poser.pugx.org/tsubasarcs/laravel-privacier/license" alt="License"></a>

> This package provides to record user assent privacy policy date with Laravel

# Installation

Install by composer
```
    $ composer require tsubasarcs/laravel-privacier
```

Registing Service Provider and Aliases

If you are using laravel 5.5 or above, you can use auto discover also, you don't need put in service provider to `app.php`.

``` php
<?php

//app.php

'providers' => [
        \Tsubasarcs\Privacier\Providers\PrivacyServiceProvider::class,
    ],
    
'aliases' => [
        'Privacier' => \Tsubasarcs\Privacier\Facades\Privacier::class,
    ],
```

Run the following on your terminal to publish the migrations:
``` bash
$ php artisan vendor:publish --provider="Tsubasarcs\Privacier\Providers\PrivacyServiceProvider" --tag="migrations"
```

If you want to change some parameter, you can run the following on your terminal to publish the config:
``` bash
$ php artisan vendor:publish --provider="Tsubasarcs\Privacier\Providers\PrivacyServiceProvider" --tag="config"
```

# Usage
Laravel-privacier provides two routes for store user confirm Privacy Policy and set privacy cookie for guest after confirm Privacy Policy.
``` php
route('privacy.store') // /privacy/store
route('privacy.set_cookie') // /privacy/set_cookie
```

Use Facade Privacier
``` php
Privacier::updateOrCreate(string $attribute_key, array $values); //return model
Privacier::existUid($uid); //return bool
Privacier::exists($attribute); //return bool
```

# License
Laravel-privacier is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).