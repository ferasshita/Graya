<?php

return [
    'default' => env('CACHE_STORE', 'database'),
    
    'stores' => [
        'database' => [
            'driver' => 'database',
            'table' => env('CACHE_TABLE', 'cache'),
            'connection' => env('CACHE_DATABASE_CONNECTION'),
            'lock_connection' => env('CACHE_LOCK_CONNECTION'),
        ],
        
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],
        
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],
    ],
    
    'prefix' => env('CACHE_PREFIX', 'graya_cache'),
];
