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
 * Font-awesome asset bundle.
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = "@bower/font-awesome";
    public $css = [
        'css' => 'css/font-awesome.min.css',
    ];
}