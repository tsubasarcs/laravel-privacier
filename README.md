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

If you need more examples and documentation, see [documentation](https://github.com/tsubasarcs/laravel-privacier/wiki)..