<?php

return [
    'public' => [
        '/' => [
            'controller' => 'Main',
            'method' => 'index',
        ],
        '/about' => [
            'controller' => 'About',
            'method' => 'index',
        ],
    ],
    'admin' => [
        '/' => [
            'controller' => 'Dashboard',
            'method' => 'index',
        ],
        '/users' => [
            'controller' => 'Users',
            'method' => 'index',
        ],
        '/users/create' => [
            'controller' => 'Users',
            'method' => 'create',
        ],
    ],
];
