<?php

return [
    'ctrl' => [
        'title' => 'Link',
        'label' => 'name',
        'hideTable' => true,
    ],
    'columns' => [
        'name' => [
            'label' => 'Link Label',
            'config' => ['type' => 'input'],
        ],
        'url' => [
            'label' => 'URL',
            'config' => ['type' => 'link'],
        ],
        'type' => [
            'label' => 'Type',
            'config' => [
                'type' => 'number',
                'default' => 0
            ],
        ],
        'landscape' => [
            'config' => ['type' => 'passthrough'],
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'name, url, type'],
    ],
];