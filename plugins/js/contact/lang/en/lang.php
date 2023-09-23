<?php
return [
    'plugin' => [
        'name' => 'Contact',
        'description' => 'Plugin for view the contact requests sent from website form.',
        'permissions' => [
            'visibility' => [
                'label' => 'View module.'
            ]
        ]
    ],
    'fields' => [
        'name' => 'Name',
        'email' => 'Email',
        'msg' => 'Message',
        'sent_at' => 'Sent at'
    ],
    'messages' => [
        'form_successful' => 'We\'ve received your request correctly. Thanks!',
        'form_unsuccessful' => 'An error has been ocurred during form submission. Please, try again.',
        'unaccepted_policy' => 'You must accept the privacy policy!.',
        'invalid_captcha' => 'An error has been ocurred during captcha verification. Please, try again.'
    ]
];
