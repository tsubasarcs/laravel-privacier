<?php
return [
    'service_providers' => [
        'path' => 'privacy',
        'routes' => true,
    ],
    'models' => [
        'class_name' => Tsubasarcs\Privacier\Privacy::class,
        'names' => [
            'store_column' => 'uid',
            'update_attribute' => 'uid',
        ],
    ],
    'sessions' => [
        'keys' => [
            'store' => 'member.uid',
            'update' => 'member.uid',
        ],
    ],
    'cookies' => [
        'name' => 'parenting_privacy',
        'value' => 'I love Parenting',
        'minutes' => 525600, // a year
    ],
    'messages' => [
        'store' => '儲存成功!',
        'set_cookie' => '設定Cookie成功!',
    ]
];
