<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Masuk';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><img src="<?= $directoryAsset ?>/img/logo-uns.png" alt="<?= Html::encode($this->title) ?>" title="<?= Html::encode($this->title) ?>"/></a>
    </div>

    <div class="login-head">
        <p>Masukkan username dan password anda</p>
    </div>

    <div class="login-box-body">

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username'), 'autofocus' => true]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <div class="login-foot">
            <a href="lupa">Lupa Password? </a> |
            <a href="signup">Belum Punya Akun?</a> |
            <a href="help">Bantuan</a>
        </div>


    </div>
</div>
