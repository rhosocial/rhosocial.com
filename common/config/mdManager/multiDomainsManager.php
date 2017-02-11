<?php

/* 
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.me/
 * @copyright Copyright (c) 2016 - 2017 vistart
 * @license https://vistart.me/license/
 */

return [
    'class' => 'common\components\MultiDomainsManager',
    'baseDomain' => $baseDomain,
    'subDomains' => [
        'sso' => [
            'component' => require(__DIR__ . '/../../../sso.rhosocial.com/config/urlManager.php'),
        ],
        'www' => [
            'component' => require(__DIR__ . '/../../../www.rhosocial.com/config/urlManager.php'),
        ],
    ],
];
