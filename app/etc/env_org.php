<?php
return [
    'cache' => [
        'graphql' => [
            'id_salt' => 'XQvpgbUK8utFmEKwVmw6vVCy2pkdByQN'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '54f_'
            ],
            'page_cache' => [
                'id_prefix' => '54f_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'config' => [
        'async' => 0
    ],
    'backend' => [
        'frontName' => 'admin_3klezr1'
    ],
    'crypt' => [
        'key' => 'base64ECq04GZ4deXDLqA4GK5yS1C1rVk4hgeLYfTpe9jvvsk='
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'magento',
                'username' => 'magento',
                'password' => '*68d_Tl0RLSP',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'graphql_query_resolver_result' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'testlicious.com'
    ],
    'install' => [
        'date' => 'Sun, 04 Jan 2026 09:36:41 +0000'
    ]
];
