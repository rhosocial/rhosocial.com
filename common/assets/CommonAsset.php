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

namespace common\assets;

use yii\web\AssetBundle;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class CommonAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/common';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/theme.css',
        'css/Lato.woff2',
    ];
    
    public $depdnes = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesomeAsset',
        'common\assets\OpenSansAsset',
        'common\assets\HolderAsset',
    ];
}