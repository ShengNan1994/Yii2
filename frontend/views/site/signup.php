<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '博客账号注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写以下内容：</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>


                <?= $form->field($model, 'repassword')->passwordInput() ?>

                <!-- --><?/*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            'captchaAction'=>'frontend/site/captcha',//【test为模块，login为控制器，需要指定，用默认控制器sit无需指定】
                        ]) */?>
                <?= $form->field($model, 'verifyCode', ['options' => ['class' => 'form-group form-group-lg'],])->widget(yii\captcha\Captcha::className(),[
                    'options' => ['maxlength' => 4, 'style' => 'width: 190px; padding: 8px;', 'placeholder' => '请输入验证码'],
                    'template' => "{input} {image}",
                    'imageOptions' => ['alt' => '验证码','id' => 'login_code', 'src' => ''],]); ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
