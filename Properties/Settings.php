<?php

$config = array (
    /**
     * Default routing settings,
     * defaultController is which opens when no specific controller is,
     * defaultPage is which controller method will be called 
     */
    'route' => array (
        'defaultController'     =>      'SiteController',
        'defaultPage'           =>      'index',
    ),
    
    /**
     * Database settings
     * Type will be database type (for now, there is only mysql),
     * Host, user, password, db is standart defined constants 
     */
    'database' => array (
        'type'                  =>      'mysql',
        'host'                  =>      'localhost',
        'user'                  =>      '****',
        'password'              =>      '****',
        'db'                    =>      '****',
    ),
);
