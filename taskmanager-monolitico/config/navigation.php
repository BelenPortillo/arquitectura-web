<?php

return [
    'main' => [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'roles' => ['administrador', 'usuario'],
        ],
        [
            'label' => 'Tareas',
            'route' => 'tareas.index',
            'roles' => ['administrador', 'usuario'],
        ],
        [
            'label' => 'Usuarios',
            'route' => 'usuarios.index',
            'roles' => ['administrador', 'usuario', 'supervisor'], // solo admins
        ],
        [
            'label' => 'Reportes',
            'dropdown' => [
                [
                    'label' => 'Reporte General',
                    'route' => 'reportes.general',
                    'roles' => ['administrador'],
                ],
                [
                    'label' => 'Mis Tareas',
                    'route' => 'reportes.usuario',
                    'roles' => ['usuario'],
                ],
            ],
        ],
    ],
];

