<?php
return [
    'ctrl' => [
        'title' => 'Landscape',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,description',
        'iconfile' => 'EXT:t3_landscape/Resources/Public/Icons/tx_t3landscape_domain_model_landscape.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, title, description, author, categories, links, keywords, dependencies'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => ['type' => 'check'],
        ],
        'title' => [
            'label' => 'Title',
            'config' => ['type' => 'input', 'required' => true],
        ],
        'description' => [
            'label' => 'Description',
            'config' => ['type' => 'text', 'enableRichtext' => true],
        ],
        'author' => [
            'label' => 'Author',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_t3landscape_domain_model_author',
                'items' => [['label' => '--- Select Author ---', 'value' => 0]],
            ],
        ],
        'categories' => [
            'label' => 'Categories',
            'config' => [
                'type' => 'category',
            ],
        ],
        'links' => [
            'label' => 'Links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_t3landscape_domain_model_link',
                'foreign_field' => 'landscape',
                'maxitems' => 99,
                'appearance' => ['collapseAll' => 1, 'levelLinksPosition' => 'top'],
            ],
        ],
        'keywords' => [
            'label' => 'Keywords',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_t3landscape_domain_model_keyword',
                'MM' => 'tx_t3landscape_landscape_keyword_mm',
            ],
        ],
        'dependencies' => [
            'label' => 'Dependencies',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_t3landscape_domain_model_dependency',
                'MM' => 'tx_t3landscape_landscape_dependency_mm',
            ],
        ],
    ],
];