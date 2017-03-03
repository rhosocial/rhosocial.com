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
 * Registration.
 *
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class RegController extends Controller
{
    public $defaultAction = 'new';
            
    /**
     * Register new user.
     *
     * @param string $password Password. If you do not specify it, '123456' will be taken.
     * @return boolean
     */
    public function actionNew($password = '123456')
    {
        $user = new User(['password' => $password]);
        try {
            $result = $user->register();
            if ($result === false) {
                throw new \yii\base\InvalidValueException('User Register Failed.');
            }
            if ($result instanceof \Exception) {
                throw $result;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
            return false;
        }
        echo "User Registered: " . $user->readableGuid . ' : ' . $user->id . PHP_EOL;
        return false;
    }
    
    /**
     * Deregister user.
     *
     * @param string $id User ID No.
     */
    public function actionDelete($id)
    {
        $user = User::find()->id($id)->one();
        if (!$user) {
            echo 'User Not Found.' . PHP_EOL;
            return false;
        }
        
        try {
            if ($user->deregister())
            {
                echo 'User "' . $user->id . '" Deregistered.' . PHP_EOL;
                return true;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
            return false;
        }
    }
}