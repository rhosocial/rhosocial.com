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
 * Vue.js asset bundle.
 *
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class VueAsset extends AssetBundle
{
    public $sourcePath = '@bower/vue/dist';
    public $js = [
        'vue.min.js',
    ];
}