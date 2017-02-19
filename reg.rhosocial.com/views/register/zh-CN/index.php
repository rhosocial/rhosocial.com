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
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $error string */
/* @var $registerForm RegisterForm */
$this->title = 'Register';
$md = \Yii::$app->multiDomainsManager;
/* @var $md common\components\MultiDomainsManager */
$homeUrlManager = $md->get();
/* @var $homeUrlManager common\components\MultiDomainsUrlManager */
$ssoUrlManager = $md->get('sso');
?>
<div class="register-box">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-6">
        <?= $form->field($registerForm, 'nickname', [
            'options' => [
                'class' => 'form-group'
            ],
            'template' => "{input}\n{hint}\n{error}",
        ])->textInput([
            'class' => 'form-control',
            'placeholder' => $registerForm->attributeLabels()['nickname'],
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>