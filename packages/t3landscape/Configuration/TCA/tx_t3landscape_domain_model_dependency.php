<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'Dependency',
        'label' => 'package',
        'label_alt' => 'version',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'searchFields' => 'package,version',
        'iconfile' => 'EXT:t3_landscape/Resources/Public/Icons/tx_t3landscape_domain_model_dependency.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'package, version'],
    ],
    'columns' => [
        'package' => [
            'label' => 'Package Name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
                'placeholder' => 'e.g. helhum/typo3-console'
            ],
        ],
        'version' => [
            'label' => 'Version / Constraint',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim',
                'placeholder' => 'e.g. ^12.0'
            ],
        ],
    ],
];