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

namespace reg_rhosocial_com\controllers\register;

use Yii;
use yii\base\Action;
use yii\db\Exception;
use yii\helpers\Url;
use reg_rhosocial_com\controllers\RegisterController;
use reg_rhosocial_com\models\forms\RegisterForm;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class IndexAction extends Action
{
    /**
     * Logged-in user can not register.
     * If a user is currently logged in, it will jump to the prompt page.
     * 
     */
    public function run()
    {
        if (!Yii::$app->user->getIsGuest()) {
            $homeUrlManager = Yii::$app->multiDomainsManager->get();
            return $this->controller->redirect($homeUrlManager->createAbsoluteUrl(''));
        }
        $form = new RegisterForm();
        if ($form->load(Yii::$app->request->post())) {
            try {
                $result = $form->register();
            } catch (\Exception $ex) {
                $result = $ex->getMessage();
            }
            if ($result === false) {
                return $this->controller->render('index', ['registerForm' => $form, 'error' => $result]);
            }
        }
        return $this->controller->render('index', ['registerForm' => $form]);
    }
}