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

use Yii;
use yii\web\ForbiddenHttpException;

/**
 * This component needs MultiDomainsManager component.
 * Usage:
 * config/web.php (basic template) or config/main.php (advanced template):
 * ```php
 * $config = [
 *     ...
 *     'components' => [
 *         ...
 *         'multiDomainsManager' => [
 *              'baseDomain' => <Base Domain>,
 *         ],
 *         'user' => [
 *             'class' => 'common\web\SSOUser',
 *             'enableAutoLogin' => true,
 *             'identityClass' => <User Identity Class>,
 *             'identityCookie' => [
 *                 'name' => '_identity',
 *                 'httpOnly' => true,
 *                 'domain' => '.' . <Base Domain>,    // same as Multi-Domains Manager's `baseDomain` property.
 *             ],
 *         ],
 *         'session' => [
 *             ...
 *             'cookieParams' => [
 *                 'domain' => '.' . <Base Domain>,    // same as Multi-Domains Manager's `baseDomain` property.
 *                 'lifetime' => 0,
 *             ],
 *             ...
 *         ],
 *         ...
 *     ],
 * ];
 * ```
 * @author vistart <i@vistart.me>
 */
class SSOUser extends \yii\web\User
{
    public $ssoDomain = 'sso';
    
    public $loginUrl = ['sso/login'];
    
    public $multiDomainsManagerId = 'multiDomainsManager';
    
    public function loginRequired($checkAjax = true, $checkAcceptHeader = true)
    {
        $request = Yii::$app->getRequest();
        $canRedirect = !$checkAcceptHeader || $this->checkRedirectAcceptable();
        if ($this->enableSession
            && $request->getIsGet()
            && (!$checkAjax || !$request->getIsAjax())
            && $canRedirect
        ) {
            $this->setReturnUrl($request->getAbsoluteUrl());
        }
        if ($this->loginUrl !== null && $canRedirect) {
            $loginUrl = (array) $this->loginUrl;
            if ($loginUrl[0] !== Yii::$app->requestedRoute) {
                $ssoUrlManager = $this->getMultiDomainsManager()->get($this->ssoDomain);
                return Yii::$app->getResponse()->redirect($ssoUrlManager->createAbsoluteUrl($this->loginUrl));
            }
        }
        throw new ForbiddenHttpException(Yii::t('yii', 'Login Required'));
    }
    
    protected function getMultiDomainsManager()
    {
        if (!empty($this->multiDomainsManagerId) && is_string($this->multiDomainsManagerId)) {
            $mdId = $this->multiDomainsManagerId;
            return Yii::$app->$mdId;
        }
        return Yii::$app->multiDomainsManager;
    }
}