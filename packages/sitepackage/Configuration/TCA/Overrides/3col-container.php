<?php
defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        '3col-container',
        '3 Col Container',
        'Insert an element dividing the content area into three columns',
        [
            [
                ['name' => 'Left Column', 'colPos' => 201],
                ['name' => 'Middle Column', 'colPos' => 202],
                ['name' => 'Right Column', 'colPos' => 203]
            ]
        ]
    )
    )
);