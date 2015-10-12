<?php
use rockunit\migrations\SessionsMigration;

return [

    'mongodb' => [
        'dsn' => 'mongodb://travis:test@localhost:27017',
        'defaultDatabaseName' => 'rocktest',
        'options' => [],
    ],
    'databases' => [
        'mysql' => [
            'dsn' => 'mysql:host=127.0.0.1;dbname=rocktest',
            'username' => 'travis',
            'password' => '',
            'migrations' => [
                ['class' => SessionsMigration::className()],
            ]
        ],
        'pgsql' => [
            'dsn' => 'pgsql:host=localhost;dbname=rocktest;port=5432;',
            'username' => 'postgres',
            'password' => 'postgres',
            'typeCast' => false,
            'migrations' => [
                ['class' => SessionsMigration::className()],
            ]
        ],
    ]
];
