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

namespace reg_rhosocial_com\controllers;

use Yii;
use yii\helpers\Url;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class RegisterController extends \yii\web\Controller
{
    const SESSKEY_REG_REGISTER_NEW_USER = 'sesskey_reg_register_new_user';
    public $layout = 'register/main';
    
    public function actions()
    {
        return [
            'index' => [
                'class' => 'reg_rhosocial_com\controllers\register\IndexAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionFinish()
    {
        $id = Yii::$app->session->getFlash(static::SESSKEY_REG_REGISTER_NEW_USER);
        if (empty($id)) {
            return $this->redirect(Url::to(['register/index']));
        }
        return $this->render('finish', ['id' => $id]);
    }
}