<?php
return [
    'admin.client' => [
        'text' => 'Client List',
        'url' => route('admin.client.index'),
        'icon' => 'fa fa-users',
        'type' => 'single',
        'submenu' => []
    ],


    'admin.invoice' => [
        'text' => 'Invoice',
        'url' => route('admin.invoice.create'),
        'icon' => 'fa fa-usd',
        'type' => 'submenu',
        'submenu' => [
            'admin.invoice.create' => [
                'text' => 'Create Invoice',
                'url' => route('admin.invoice.create'),
                'icon' => 'fa fa-plus',
                'type' => 'single',
                'submenu' => []
            ],
            'admin.invoice.index' => [
                'text' => 'Invoice List',
                'url' => route('admin.invoice.index'),
                'icon' => 'fa fa-list',
                'type' => 'single',
                'submenu' => []
            ],
        ]
    ],

//    "admin.file" => [
//        'text' => 'File Status',
//        'url' => null,
//        'icon' => 'fa fa-file',
//        'type' => 'submenu',
//        'submenu' => [
//            'admin.file.index' => [
//                'text' => 'File List',
//                'url' => route('admin.file_status.index'),
//            ],
//        ]
//    ],

    'web_setting' => [
        'text' => 'Web Setting',
        'url' => null,
        'icon' => 'fa fa-safari',
        'type' => 'submenu',
        'submenu' => [
            'admin.general-config.index' => [
                'text' => 'General Config',
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
        'icon' => 'fa fa-file-text',
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

            'admin.page' => [
                'text' => 'Custom Page',
                'url' => route('admin.page.index'),
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


