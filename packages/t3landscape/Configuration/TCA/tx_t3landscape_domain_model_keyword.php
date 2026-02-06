<?php

return [
    'ctrl' => [
        'title' => 'Keyword',
        'label' => 'name',
    ],
    'columns' => [
        'name' => [
            'label' => 'Keyword',
            'config' => ['type' => 'input', 'required' => true],
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'name'],
    ],
];