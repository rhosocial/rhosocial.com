<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.me/
 * @copyright Copyright (c) 2016 - 2017 vistart
 * @license https://vistart.me/license/
 */
/**
 * Set alias for each project(sub-domain) first.
 */
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@rhosocial_com', dirname(dirname(__DIR__)));
Yii::setAlias('@www_rhosocial_com', dirname(dirname(__DIR__)) . '/www.rhosocial.com');
Yii::setAlias('@sso_rhosocial_com', dirname(dirname(__DIR__)) . '/sso.rhosocial.com');

Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@console_test', dirname(dirname(__DIR__)) . '/console_test');

/**
 * Get configuration parameters from specified files.
 * If speficied file doesn't exist, the default parameter will be taken.
 * @param string $file Parameters file name.
 * @param array $default Default parameters, if file doesn't exist.
 * @return array params.
 */
function getParamsFromFile($file, $default = [])
{
    return file_exists($file) ? require($file) : $default;
}
$baseDomain = getParamsFromFile(__DIR__ . '/base/baseDomain-local.php', getParamsFromFile(__DIR__ . '/base/baseDomain.php', 'example.com'));
defined('BASE_DOMAIN') or define('BASE_DOMAIN', $baseDomain);
