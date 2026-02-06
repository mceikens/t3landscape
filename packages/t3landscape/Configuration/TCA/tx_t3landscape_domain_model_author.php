<?php

return [
    'ctrl' => [
        'title' => 'Author',
        'label' => 'name',
        'iconfile' => 'EXT:t3_landscape/Resources/Public/Icons/tx_t3landscape_domain_model_author.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'name, landscapes'],
    ],
    'columns' => [
        'name' => [
            'label' => 'Name',
            'config' => ['type' => 'input', 'required' => true],
        ],
        'landscapes' => [
            'label' => 'Landscapes',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_t3landscape_domain_model_landscape',
                'foreign_table_where' => 'AND tx_t3landscape_domain_model_landscape.author = ###THIS_UID###',
                'readOnly' => true,
            ],
        ],
    ],
];