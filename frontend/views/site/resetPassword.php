<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset Password';

$fieldOptions1 = [
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
        <p>Masukkan password baru anda</p>
    </div>

    <div class="login-box-body">

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'password', $fieldOptions1)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autofocus' => true]) ?>

        <div class="row">
            <div class="col-xs-4 col-offset-xs-8">
                <?= Html::submitButton('Reset', ['class' => 'btn btn-danger btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <div class="login-foot">
            <a href="login">Ingat Password? </a> |
            <a href="help">Bantuan</a>
        </div>


    </div>
</div>
