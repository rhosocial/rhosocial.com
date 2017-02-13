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
    'bundles' => [
        'yii\web\JqueryAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/jquery/2.2.4/jquery.js' : 'https://cdn.bootcss.com/jquery/2.2.4/jquery.js',
            ],
            'jsOptions' => [
                'position' => \yii\web\View::POS_HEAD,
            ],
        ],
        'yii\bootstrap\BootstrapAsset' => [
            'sourcePath' => null,
            'css' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css' : 'https://cdn.bootcss.com/bootstrap/3.3.7/bootstrap.min.css',
            ],
        ],
        'yii\bootstrap\BootstrapPluginAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js' : 'https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js',
            ],
            'jsOptions' => [
                'position' => \yii\web\View::POS_HEAD,
            ],
        ],
        'yii\gii\TypeAheadAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/typeahead.js/0.11.1/typeahead.bundle.js' : 'https://cdn.bootcss.com/typeahead.js/0.11.1/typeahead.bundle.min.js',
            ],
        ],
        'common\assets\VueAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/vue/2.1.10/vue.js' : 'https://cdn.bootcss.com/vue/2.1.10/vue.min.js',
            ],
        ],
    ],
];
