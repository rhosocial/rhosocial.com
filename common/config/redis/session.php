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
    'class' => 'yii\redis\Session',
    'keyPrefix' => getParamsFromFile(__DIR__ . '/keyPrefix.php', 'rho_local_sess_'),
    'redis' => 'redis',
    'name' => getParamsFromFile(__DIR__ . '/name.php', 'RHO_LOCAL_SESSID_'),
    'cookieParams' => ['domain' => '.' . BASE_DOMAIN, 'lifetime' => 0]
];
