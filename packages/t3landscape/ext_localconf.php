<?php

use MCEikens\T3Landscape\Controller\LandscapeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::configurePlugin(
    'T3Landscape',
    'T3Landscape',
    [
        LandscapeController::class => 'index',
    ],
    [
        LandscapeController::class => 'index',
    ]
);