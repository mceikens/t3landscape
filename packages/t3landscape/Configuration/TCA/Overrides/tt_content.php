<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$pluginSignature = ExtensionUtility::registerPlugin(
    'T3Landscape',
    'T3Landscape',
    'Landscape of TYPO3 ecosystem',
    'actions-users',
    'T3Landscape',
    'Landscape of TYPO3 ecosystem',
    'FILE:EXT:t3landscape/Configuration/FlexForms/Plugin.xml',
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'pi_flexform,',
    $pluginSignature,
    'after:subheader',
);
