<?php
return [
    'routes' => [
        [
            'name' => 'hello',
            'route' => "--name=",
            'short_description' => "Good morning!! This is a beautiful day",
            "handler" => ['App\Command\Hello', 'run'],
        ],
    ],
    "service_manager" => [
        "invokables" => [],
        "factories" => [],
    ],
];
