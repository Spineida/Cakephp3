<?php
/*
    Archivo de configuración para sidebar de admin.
    Para cargar este archivo, agregar en beforeRender AppController: 

    Configure::load('admin-sidebar');    
    $this->set('sidebar', Configure::read('sidebar'));

[
    'name' => '', # Nombre a mostrar
    'ico' => false, # Clase de icono a utilizar
    'current' => [ # Marca elemento al estar en el link especificado, puede tener como valor false
        'controller' => false, # controller actual
        'action' => false # action actual
    ]
    'submenu' => [ # De no tener submenú dejar en false
        [
            'name' => '',
            'current' => ['action' => '', 'controller' => ''],
            'submenu' => [
                'name' => '',
                'current' => ['action' => '', 'controller' => ''],
            ],
        ],
        ...
    ]...
]
*/
return [
    'admin' => [
        [
            'name' => 'Usuarios',
            'ico' => 'fas fa-users',
            'current' => false,
            'submenu' => [
                [
                    'name' => 'Listado de usuarios',
                    'ico' => '',
                    'current' => ['controller' => 'Users', 'action' => 'index']
                ],
                [
                    'name' => 'Agregar usuario',
                    'ico' => '',
                    'current' => ['controller' => 'Users', 'action' => 'add']
                ]
            ]
        ]
    ],
    'visita' => [
        [
            'name' => 'Usuarios',
            'ico' => 'fas fa-users',
            'current' => false,
            'submenu' => [
                [
                    'name' => 'Listado de usuarios',
                    'ico' => '',
                    'current' => ['controller' => 'Users', 'action' => 'index']
                ]
            ]
        ]
    ]
];