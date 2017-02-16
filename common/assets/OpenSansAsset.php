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
 * open-sans asset bundle.
 *
 * @version 1.0
 * @author vistart <i@vistart.name>
 */
class OpenSansAsset extends AssetBundle {
    public $sourcePath = '@bower/open-sans';
    public $css = [
        'css/open-sans.min.css',
    ];
}