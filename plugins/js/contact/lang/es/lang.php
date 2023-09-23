<?php
return [
    'plugin' => [
        'name' => 'Contacto',
        'description' => 'Plugin para visualizar las solicitudes de contacto realizadas desde el formulario de la web.',
        'permissions' => [
            'visibility' => [
                'label' => 'Ver módulo.'
            ]
        ]
    ],
    'fields' => [
        'name' => 'Nombre',
        'email' => 'Email',
        'msg' => 'Mensaje',
        'sent_at' => 'Envíado el'
    ],
    'messages' => [
        'form_successful' => 'Hemos recibido sus datos correctamente. ¡Gracias!',
        'form_unsuccessful' => 'Ha ocurrido un error al procesar el formulario. Por favor, vuelve a intentarlo.',
        'unaccepted_policy' => 'Debes aceptar nuestra política de privacidad.',
        'invalid_captcha' => 'Ha ocurrido un error durante la validación del captcha. Por favor, vuelve a intentarlo.'
    ]
];
