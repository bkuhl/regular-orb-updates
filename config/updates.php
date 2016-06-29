<?php

return [

    // security token
    'token' => env('TOKEN'),

    // Send updates to this email address
    'url' => env('URL', 'http://real.place/webhook/user-update'),

    // Updates are sent from
    'from' => [
        'email' => env('UPDATE_SENDER_EMAIL'),
    ],

    // Sometimes your job consists of various tasks and
    // you might want to randomly pick one for each update.
    'tasks' => [
        [
            'costCenter'    => env('COST_CENTER'),
            'description'   => "My test task",
            // URLs not supported, files must be locally hosted and in the storage directory
            'image'         => 'update-attachments/support-and-rancher.png'
        ]
    ]

];
