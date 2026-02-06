<?php
defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        '25-75col-container',
        '25/75 Column Container',
        'Insert an element dividing the content area into two columns',
        [
            [
                ['name' => 'Left Column', 'colPos' => 201],
                ['name' => 'Right Column', 'colPos' => 202]
            ]
        ]
    )
    )
);