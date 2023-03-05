<?php

// config for Cxj/LookingGlass
return [
    'url'    => env('LOOKING_GLASS_URL', 'localhost:8000/webhook'),
    'name'   => env('LOOKING_GLASS_NAME', 'Test App'),
    'label'  => env('LOOKING_GLASS_LABEL', 'Test Label'),
    'secret' => env('LOOKING_GLASS_SECRET', 'shared-secret'),
];
