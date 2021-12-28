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
            'brand' => [
                'text' => 'Brand',
                'url' => route('admin.brand.index'),
            ],
            'team' => [
                'text' => 'Team',
                'url' => route('admin.team.index'),
            ],
            'testimonial' => [
                'text' => 'Testimonial',
                'url' => route('admin.testimonial.index'),
            ],
            'faq' => [
                'text' => 'FAQ',
                'url' => route('admin.faq.index'),
            ]
        ]
    ],

];

?>


