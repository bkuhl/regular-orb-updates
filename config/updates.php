<?php

return [

    // Send updates to this email address
    'to' => env('UPDATE_RECIPIENT'),

    // Updates are sent from
    'from' => [
        'email' => env('UPDATE_SENDER_EMAIL'),
        'name'  => env('UPDATE_SENDER_NAME')
    ],

    // Updates should have this subject
    'subject' => env('UPDATE_SUBJECT'),

    // Sometimes your job consists of various tasks and
    // you might want to randomly pick one for each update.
    'tasks' => [
        [
            'description'   => "Meetings, meetings and more meetings"
        ],
        [
            'description'   => "I'm petting my dog",
            'image'         => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png'
        ]
    ]

];
