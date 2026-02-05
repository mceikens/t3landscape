<?php

use MCEikens\LogWriter\Log\Writer\RotatingJsonLogWriter;
use Monolog\Handler\RotatingFileHandler;
use Psr\Log\LogLevel;
use TYPO3\CMS\Core\Cache\Backend\RedisBackend;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Log\Writer\FileWriter;

/*
 * ##############################
 * ## Database ##################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['driver'] = getenv('TYPO3_DATABASE_DRIVER');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'] = getenv('TYPO3_DATABASE_HOST');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['port'] = getenv('TYPO3_DATABASE_PORT');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = getenv('TYPO3_DATABASE_USER');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = getenv('TYPO3_DATABASE_PASSWORD');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = getenv('TYPO3_DATABASE_NAME');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['charset'] = getenv('TYPO3_DATABASE_CHARSET');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['tableoptions']['collate'] = getenv('TYPO3_DATABASE_COLLATE');
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['tableoptions']['charset'] = getenv('TYPO3_DATABASE_CHARSET');

/*
 * ##############################
 * ## BACKEND ###################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['BE']['compressionLevel'] = 9;

/*
 * ##############################
 * ## FRONTEND ##################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel'] = 9;

/*
 * ##############################
 * ## MAIL ######################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = '';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'smtp';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = getenv('TYPO3_SMTP_PASSWORD');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_encrypt'] = getenv('TYPO3_SMTP_ENCRYPT');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = getenv('TYPO3_SMTP_SERVER');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = getenv('TYPO3_SMTP_USERNAME');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = getenv('TYPO3_SMTP_DEFAULT_MAIL_ADDRESS');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = getenv('TYPO3_SMTP_DEFAULT_MAIL_NAME');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailReplyToAddress'] = getenv('TYPO3_SMTP_DEFAULT_MAIL_ADDRESS');
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailReplyToName'] = getenv('TYPO3_SMTP_DEFAULT_MAIL_NAME');

/*
 * ##############################
 * ## SYSTEM ####################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['SYS']['features']['security.backend.enforceReferrer'] = false;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['features']['security.backend.enforceContentSecurityPolicy'] = getenv('TYPO3_BACKEND_CONTENT_SECURITY_POLICY');
$GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxySSL'] = '*';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = getenv('TYPO3_TRUSTED_HOSTS_PATTERN');
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] = 'T3Landscape';

/*
 * ##############################
 * ## CACHING ###################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['pages']['backend'] = RedisBackend::class;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['pages']['options'] = [
    'database' => 1,
    'hostname' => getenv('KEY_VALUE_STORE_HOSTNAME'),
    'port' => (int) getenv('KEY_VALUE_STORE_PORT'),
    'password' => getenv('KEY_VALUE_STORE_PASSWORD'),
    'defaultLifetime' => 86400 * 7,
    'compression' => true,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['pagesection']['backend'] = RedisBackend::class;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['pagesection']['options'] = [
    'database' => 2,
    'hostname' => getenv('KEY_VALUE_STORE_HOSTNAME'),
    'port' => (int) getenv('KEY_VALUE_STORE_PORT'),
    'password' => getenv('KEY_VALUE_STORE_PASSWORD'),
    'defaultLifetime' => 86400 * 7,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['hash']['backend'] = RedisBackend::class;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['hash']['options'] = [
    'database' => 3,
    'hostname' => getenv('KEY_VALUE_STORE_HOSTNAME'),
    'port' => (int) getenv('KEY_VALUE_STORE_PORT'),
    'password' => getenv('KEY_VALUE_STORE_PASSWORD'),
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['rootline']['backend'] = RedisBackend::class;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['rootline']['options'] = [
    'database' => 4,
    'hostname' => getenv('KEY_VALUE_STORE_HOSTNAME'),
    'port' => (int) getenv('KEY_VALUE_STORE_PORT'),
    'password' => getenv('KEY_VALUE_STORE_PASSWORD'),
];

/*
 * ##############################
 * ## Log Writer ################
 * ##############################
 */
$GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'] = [
    LogLevel::DEBUG => [
        RotatingJsonLogWriter::class => [
            'logFile' => Environment::getVarPath(). '/log/custom/typo3.log',
            'maxFiles' => 5,
            'channel' => 'TYPO3.Application',
            'interval' => RotatingFileHandler::FILE_PER_DAY
        ],
        FileWriter::class => [
            'logFile' => Environment::getVarPath(). '/log/typo3.log',
        ],
    ],
];