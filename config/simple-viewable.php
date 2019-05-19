<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'models' => [

        /*
         * Here you can configure the default `View` model.
         */
        'view' => [
            'model' => \Nddcoder\LaravelSimpleViewable\View::class,
            'table_name' => 'views',
            'connection' => env('DB_CONNECTION', 'mysql'),

        ],

    ],
];
