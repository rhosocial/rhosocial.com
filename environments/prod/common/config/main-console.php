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
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log'],
    'modules' => require(__DIR__ . '/modules/modules.php'),
    'components' => [
        //'assetManager' => require(__DIR__ . '/assetManager/assetManager.php'),
        'authManager' => require(__DIR__ . '/authManager/authManager.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => require(__DIR__ . '/db/db.php'),
        'formatter' => require(__DIR__ . '/formatter/formatter.php'),
        'i18n' => require(__DIR__ . '/i18n/i18n.php'),
        'log' => require(__DIR__ . '/log/log.php'),
        'mailer' => require(__DIR__ . '/mailer/mailer.php'),
        'mongodb' => require(__DIR__ . '/mongodb/mongodb.php'),
        'multiDomainsManager' => require(__DIR__ . '/mdManager/multiDomainsManager.php'),
        'redis' => require(__DIR__ . '/redis/redis.php'),
        'session' => require(__DIR__ . '/redis/session.php'),
        'user' => require(__DIR__ . '/user/user.php'),
    ],
];
