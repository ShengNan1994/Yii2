<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '博客登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写以下字段以登录：</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'verifyCode', ['options' => ['class' => 'form-group form-group-lg'],])->widget(yii\captcha\Captcha::className(),[
                    'options' => ['maxlength' => 4, 'style' => 'width: 190px; padding: 8px;', 'placeholder' => '请输入验证码'],
                    'template' => "{input} {image}",
                    'imageOptions' => ['alt' => '验证码','id' => 'login_code', 'src' => ''],]); ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    如果忘记密码你可以 <?= Html::a('点击这里', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
