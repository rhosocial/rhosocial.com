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

namespace console\modules\user\controllers;

use common\models\user\User;
use yii\console\Controller;

/**
 * Show information.
 *
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class InfoController extends Controller
{
    /**
     * Get user by User ID No.
     * @param string $id
     * @return User
     * @throws \yii\base\InvalidParamException
     */
    protected static function getUserById($id)
    {
        try {
            $user = User::find()->id($id)->one();
            if (!$user) {
                throw new \yii\base\InvalidParamException('User Not Found.');
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
            \Yii::$app->end(1);
        }
        return $user;
    }
    
    /**
     * Show statistics.
     * @param string $id User ID No.
     */
    public function actionIndex($id)
    {
        $user = static::getUserById($id);
        echo $user->readableGUID . PHP_EOL;
    }
    
    /**
     * Show Profile.
     * @param string $id User ID No.
     * @todo Show Profile if profile model ready.
     */
    public function actionProfile($id)
    {
        
    }
    
    /**
     * Show Email.
     * If you do not specify $email_id parameter, the statistics of emails will
     * be given.
     * @param string $id User ID No.
     * @param string $email_id
     * @todo Show Email if email model ready.
     */
    public function actionEmail($id, $email_id = '')
    {
        
    }
}