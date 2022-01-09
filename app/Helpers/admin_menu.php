<?php
return [
    'admin.client_details' => [
        'text' => 'Client List',
        'url' => route('admin.client_details'),
        'icon' => 'fa fa-dashboard',
        'type' => 'single',
        'submenu' => []
    ],
    'admin.invoice.create' => [
        'text' => 'Invoice',
        'url' => route('admin.invoice.create'),
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
            'admin.general-config.index' => [
                'text' => 'General',
                'url' => route('admin.general-config.index'),
            ],
            'admin.service.index' => [
                'text' => 'Service',
                'url' => route('admin.service.index'),
            ],
            'admin.brand.index' => [
                'text' => 'Brand',
                'url' => route('admin.brand.index'),
            ],
            'admin.team.index' => [
                'text' => 'Team',
                'url' => route('admin.team.index'),
            ],
            'admin.testimonial.index' => [
                'text' => 'Testimonial',
                'url' => route('admin.testimonial.index'),
            ],
            'admin.faq.index' => [
                'text' => 'FAQ',
                'url' => route('admin.faq.index'),
            ]
        ]
    ],

    'pages' => [
        'text' => 'Pages',
        'url' => null,
        'icon' => 'fa fa-pages',
        'type' => 'submenu',
        'submenu' => [
            'admin.home_page.edit' => [
                'text' => 'General',
                'url' => route('admin.home_page.edit'),
            ],
            'admin.about_page.edit' => [
                'text' => 'About',
                'url' => route('admin.about_page.edit'),
            ],
        ]
    ],

    'admin.staff' => [
        'text' => 'Staff',
        'url' => route('admin.staff.index'),
        'icon' => 'fa fa-user',
        'type' => 'submenu',
        'submenu' => [
            'admin.staff.index' => [
                'text' => 'All Staff',
                'url' => route('admin.staff.index'),
            ],
            'admin.staff.create' => [
                'text' => 'Add Staff',
                'url' => route('admin.staff.create'),
            ],
        ]
    ],
];

?>


