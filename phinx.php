<?php

require "public/index.php";

return [
    "paths" => [
        "migrations" => __DIR__ . "/db",
        "seeds" => __DIR__ . "/db",
    ],
    'environements' => [
        "default_database" => "development",
        'development' => [
            "adapater" => "mysql",
            "host" => $app->getContainer()->get('database.host'),
            "name" => $app->getContainer()->get('database.name'),
            "user" => $app->getContainer()->get('database.username'),
            "pass" => $app->getContainer()->get('database.password'),

        ]
    ]
];