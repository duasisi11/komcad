<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orangtua */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orangtua-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir_ayah')->textInput() ?>

    <?= $form->field($model, 'alamat_ayah')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nomor_telepon_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir_ibu')->textInput() ?>

    <?= $form->field($model, 'tanggal_lahir_ibu')->textInput() ?>

    <?= $form->field($model, 'alamat_ibu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nomor_telepon_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
