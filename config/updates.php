<?php

return [

    // basic auth
    'user' => [
        'name' => env('USERNAME'),
        'password' => env('PASSWORD')
    ],

    // Send updates to this email address
    'url' => env('URL', 'https://real.place/api/user-update'),

    // Updates are sent from
    'from' => [
        'email' => env('UPDATE_SENDER_EMAIL'),
    ],

    // Sometimes your job consists of various tasks and
    // you might want to randomly pick one for each update.
    'tasks' => [
        [
            'costCenter'    => env('COST_CENTER'),
            'description'   => "Container Orchestration POC"
        ]
    ]

];
