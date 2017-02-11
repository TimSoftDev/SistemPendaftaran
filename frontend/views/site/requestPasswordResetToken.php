<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Lupa Password';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><img src="<?= $directoryAsset ?>/img/logo-uns.png" alt="<?= Html::encode($this->title) ?>" title="<?= Html::encode($this->title) ?>"/></a>
    </div>

    <div class="login-head">
        <p>Masukkan email dan captcha dengan benar</p>
    </div>

    <div class="login-box-body">

        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email'), 'autofocus' => true]) ?>

        <?= $form
            ->field($model, 'verifyCode')
            ->label(false)
            ->widget(Captcha::className(), [
                    'template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-barcode form-control-feedback"></span></div><div class="row"><div class="col-xs-5">{image}</div>' ]) ?>


            <div class="container-fluid no-padding">
                <?= Html::submitButton('Lanjutkan', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <div class="login-foot">
            <a href="login">Ingat Password? </a> |
            <a href="signup">Belum Punya Akun?</a> |
            <a href="help">Bantuan</a>
        </div>


    </div>
</div>
