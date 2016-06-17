<?php

return [

    // Send updates to this email address
    'to' => env('UPDATE_RECIPIENT', 'projectupdate@real.place'),

    // Updates are sent from
    'from' => [
        'email' => env('UPDATE_SENDER_EMAIL', 'ben.kuhl@realpage.com'),
        'name'  => env('UPDATE_SENDER_NAME', 'Ben Kuhl')
    ],

    // Updates should have this subject
    'subject' => env('UPDATE_SUBJECT', '8728'),

    // Sometimes your job consists of various tasks and
    // you might want to randomly pick one for each update.
    'tasks' => [
        [
            'description'   => "Answer Automation support & Foundation DevOps",
            'image'         => 'storage/update-attachments/support-and-rancher.png'
        ]
    ]

];
