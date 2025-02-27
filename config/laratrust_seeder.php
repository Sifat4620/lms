
<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'manage_books' => 'v',
            'manage_students' => 'v',
            'view_reports' => 'v',
            'manage_invoices' => 'v',
            'borrow_books' => 'v',

        ],
        'student' => [
            'borrow_books' => 'v',

        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'v' => 'view',
    ],
];
