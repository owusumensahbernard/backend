<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,


'roles_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'stock' => 'c,r,u,d',
            'report' => 'c,r,u,d',
			'profle' => 'c,r,u,d'
        ],
        'wholesaler' => [
           'stock' => 'r,u',
            'profile' => 'c,r,u,d'
        ],
        'retailer' => [
		'stock' =>    'r',
             'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]





];
