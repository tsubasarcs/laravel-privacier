<?php
return [
    'model' => Tsubasarcs\Privacier\Privacy::class,
    'column' => 'uid',
    'update_guidelines_column' => 'uid',
    'session_update_guidelines_key' => 'member.uid',
    'path' => 'privacy',
    'setup_store_routes' => true,
    'session_uid_key' => 'member.uid',
    'cookie' => [
        'name' => 'parenting_privacy',
        'value' => 'I love Parenting',
        'minutes' => 525600, // a year
    ],
    'messages' => [
        'store' => '儲存成功!',
        'set_cookie' => '設定Cookie成功!',
    ]
];
