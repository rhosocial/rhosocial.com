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
$host = getParamsFromFile(__DIR__ . '/mysql-local/host.php', 'localhost');
$dbname = getParamsFromFile(__DIR__ . '/mysql-local/dbname.php', 'rhosocial.com');

return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host=$host;dbname=$dbname",
    'username' => getParamsFromFile(__DIR__ . '/mysql-local/username.php', 'root'),
    'password' => getParamsFromFile(__DIR__ . '/mysql-local/password.php', ''),
    'tablePrefix' => getParamsFromFile(__DIR__ . '/mysql-local/tablePrefix.php', 'rhosocial_'),
    'charset' => getParamsFromFile(__DIR__ . '/mysql-local/charset.php', 'utf8mb4'),
    'enableSchemaCache' => true,
];
