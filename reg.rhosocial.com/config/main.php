<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'reg.rhosocial.com',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'reg_rhosocial_com\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-reg_rhosocial_com',
        ],
        'user' => [
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-reg_rhosocial_com', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'reg_rhosocial_com',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'reg*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@reg_rhosocial_com/messages',
                ],
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require('urlManager.php'),
    ],
    'params' => $params,
];
