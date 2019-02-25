<?php

return [

    'permission' => [
        'driver'    => 'mysql',
        'host'      => env('DB_EXT_HOST', 'localhost'),
        'database'  => env('DB_EXT_DATABASE', 'revog_minecraft'),
        'username'  => env('DB_EXT_USERNAME', 'root'),
        'password'  => env('DB_EXT_PASSWORD', ''),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        'strict'    => false,
    ],
];
