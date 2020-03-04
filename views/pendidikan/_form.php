<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendidikan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendidikan_terakhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_perguruan_tinggi_sekolah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_perguruan_tinggi_sekolah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'program_studi_jurusan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'akreditasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk_nilai_un')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
