<?php
defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        '1col-container',
        '1 Column Container',
        'Insert an element for a content area with one columns',
        [
            [
                ['name' => 'One Column', 'colPos' => 201]
            ]
        ]
    )
    )
);