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

namespace common\web;

use common\components\MultiDomainsManager;

/**
 * @property-read MultiDomainsManager $multiDomainsManager Multi-domains Manager.
 * 
 * @author vistart <i@vistart.me>
 */
class Application extends \yii\web\Application
{
    /**
     * 
     * @return MultiDomainsManager
     */
    public function getMultiDomainsManager()
    {
        return $this->get('multiDomainsManager');
    }
    
    /**
     * @inheritdoc
     */
    public function coreComponents()
    {
        return array_merge(parent::coreComponents(), [
            'multiDomainsManager' => ['class' => 'common\web\MultiDomainsManager'],
            'user' => ['class' => 'common\web\SSOUser'],
        ]);
    }
}