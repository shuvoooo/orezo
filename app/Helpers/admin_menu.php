<?php
return [
    'client_list' => [
        'text' => 'Client List',
        'url' => route('admin.client_list'),
        'icon' => 'fa fa-dashboard',
        'type' => 'single',
        'submenu' => []
    ],
    'invoice' => [
        'text' => 'Invoice',
        'url' => route('admin.invoice'),
        'icon' => 'fa fa-dashboard',
        'type' => 'single',
        'submenu' => []
    ],
    'web_setting' => [
        'text' => 'Web Setting',
        'url' => null,
        'icon' => 'fa fa-dashboard',
        'type' => 'submenu',
        'submenu' => [
            'service' => [
                'text' => 'Service',
                'url' => route('admin.service.index'),
            ],
        ]
    ],

];

?>


