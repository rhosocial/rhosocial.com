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

return [
    'components' => [
        'db' => getParamsFromFile(__DIR__ . '/db/db-local.php'),
        'mailer' => getParamsFromFile(__DIR__ . '/mailer/mailer-local.php'),
        'log' => getParamsFromFile(__DIR__ . '/log/log-local.php'),
        'redis' => getParamsFromFile(__DIR__ . '/redis/redis-local.php'),
        'session' => getParamsFromFile(__DIR__ . '/redis/redis.session.php'),
    ],
];
