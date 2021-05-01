<?php

return [
    '__name' => 'lib-watermark',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-watermark.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-watermark' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-media' => NULL
            ],
            [
                'lib-image' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibWatermark\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-watermark/library'
            ]
        ],
        'files' => []
    ]
];
