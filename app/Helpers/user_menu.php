<?php
return [
    'personal_information' => [
        'text' => 'User Information',
        'url' => null,
        'icon' => 'fa fa-user',
        'type' => 'submenu',
        'submenu' => [
            'personal_information' => [
                'text' => 'Personal Information',
                'url' => route_with_year('personal_information'),
            ],
            'spouse_details' => [
                'text' => 'Spouse Details',
                'url' => route_with_year('spouse_details'),
            ],
            'dependent_details' => [
                'text' => 'Department Details',
                'url' => route_with_year('dependent_details'),
            ],
            'bank_details' => [
                'text' => 'Bank Details',
                'url' => route_with_year('bank_details'),
            ]
        ],
    ],

    'process_flow_chart' => [
        'text' => 'Process Flow Chart',
        'url' => route_with_year('process_flow_chart'),
        'icon' => 'fa fa-dashboard',
        'type' => 'single',
        'submenu' => []
    ],

    'fill_tax_information' => [
        'text' => 'Fill Tax Information',
        'url' => null,
        'icon' => 'fa fa-dashboard',
        'type' => 'submenu',
        'submenu' => [
            'employer_details' => [
                'text' => 'Employer Details',
                'url' => route_with_year('employer_details'),
            ],
            'project_details' => [
                'text' => 'Project Details',
                'url' => route_with_year('project_details'),
            ],
            'residency_details' => [
                'text' => 'Residency Details',
                'url' => route_with_year('residency_details'),
            ],
            'expense_details' => [
                'text' => 'Expense Details',
                'url' => route_with_year('expense_details'),
            ],

            'asset_details' => [
                'text' => 'Asset Details',
                'url' => route_with_year('asset_details'),
            ],
            'miscellaneous_details' => [
                'text' => 'Miscellaneous Details',
                'url' => route_with_year('miscellaneous_details'),
            ],
            'upload_tax_documents' => [
                'text' => 'Upload Tax Documents',
                'url' => route_with_year('upload_tax_documents'),
            ]
        ],


    ],

    'my_status' => [
        'text' => 'My Status',
        'url' => null,
        'icon' => 'fa fa-dashboard',
        'type' => 'submenu',
        'submenu' => [
            'my_file_status' => [
                'text' => 'My File Status',
                'url' => route_with_year('my_file_status'),
            ],
            'view_tax_summary' => [
                'text' => 'View Tax Summary',
                'url' => route_with_year('view_tax_summary'),
            ],
            'payment_info' => [
                'text' => 'Payment Info',
                'url' => route_with_year('payment_info'),
            ],
            'my_tax_return_status' => [
                'text' => 'Refund Status',
                'url' => 'https://sa.www4.irs.gov/irfof/lang/en/irfofgetstatus.jsp',
            ],
        ]
    ],
];
