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

namespace common\components;

use Yii;

/**
 * @author vistart <i@vistart.me>
 */
class MultiDomainsManager extends \yii\base\Component
{
    /**
     * @var string the base domain.
     */
    public $baseDomain = '';
    
    /**
     * <Sub Domain Name> => [
     *     'component' => <URL Manager Component Configuration Array>,
     *     'scheme' => 'http'(default) or 'https',
     * ]
     * For example:
     * ```php
     * $baseDomain = 'example.com';
     * $subDomains = [
     *    '' => [
     *         'component' => [
     *              // `class` could be ignored as it is `common\components\MultiDomainsUrlManager`.
     *             'class' => 'yii\web\UrlManager',
     *             'enablePrettyUrl' => true,
     *             'showScriptName' => false,
     *             'suffix' => '.html',
     *             // the other properties...
     *         ],
     *         'scheme' => 'http', // `scheme` could be ignored as it is 'http'.
     *     ],
     *     'my' => [
     *         'component' => [
     *             'enablePrettyUrl' => true,
     *             'showScriptName' => false,
     *             'suffix' => '.html',
     *             'rules' => [
     *                 'posts/<year:\d{4}>/<category>' => 'post/index',
     *                 'posts' => 'post/index',
     *                 'post/<id:\d+>' => 'post/view',
     *             ],
     *         ],
     *         'scheme' => 'https',
     *     ],
     *     'sso' => [
     *         'component' => [
     *             'enablePrettyUrl' => true,
     *             'showScriptName' => false,
     *             'rules' => [
     *                 '' => 'sso/login',
     *                 'logout' => 'sso/logout',
     *             ],
     *         ],
     *         'scheme' => 'https',
     *     ],
     * ];
     * ```
     * and you can configure the `config/web.php` (basic template) or `config/main.php` (advanced template)
     * `components` section to add an element named `multiDomainsManager`:
     * ```php
     * $config = [
     *     ...
     *     'components' => [
     *         ...
     *         'multiDomainsManager' => [
     *             'baseDomain' => 'example.com',
     *             'subDomains' => [
     *                 'my' => [
     *                     'component' => require(<the path of 'my' web application UrlManager config file>),
     *                 ],
     *                 ...
     *             ],
     *         ],
     *         ...
     *     ],
     * ];
     * ```
     * @var MultiDomainsUrlManager[] array of sub-domain instances.
     */
    public $subDomains = [];
    
    /**
     * @var string Current sub-domain name. If current sub-domain does not exist
     * in `$this->subDomains`, return `Yii::$app->urlManager` instead.
     */
    public $currentDomain = '';
    
    /**
     * Get UrlManager component of specified sub-domain application.
     * @param string $subdomain
     * @return \yii\web\UrlManager
     */
    public function get($subdomain = '')
    {
        if (!isset($this->subDomains[$subdomain])) {
            return null;
        }
        $subDomainConfig = $this->subDomains[$subdomain];
        if (!isset($subDomainConfig['component'])) {
            return null;
        }
        if (!isset($subDomainConfig['component']['class'])) {
            $subDomainConfig['component']['class'] = MultiDomainsUrlManager::class;
        }
        if (!isset($subDomainConfig['component']['hostInfo'])) {
            if (!isset($subDomainConfig['scheme']) || empty($subDomainConfig['scheme'])) {
                $subDomainConfig['scheme'] = 'http';
            }
            $subDomainConfig['component']['hostInfo'] = $subDomainConfig['scheme'] . // 'http' or 'https'
                "://" . // delimiter
                ($subdomain == '' || $this->baseDomain == '' ? $subdomain . $this->baseDomain : $subdomain . '.' . $this->baseDomain);                                               // base domain
        }
        return Yii::createObject($subDomainConfig['component']);
    }
    
    /**
     * Get URL Manager of current domain web application.
     * @return \yii\web\UrlManager url manager instance.
     */
    public function getCurrent()
    {
        return $this->get($this->currentDomain) ? : Yii::$app->urlManager;
    }
}