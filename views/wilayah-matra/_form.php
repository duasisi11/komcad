<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WilayahMatra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wilayah-matra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kodam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kodim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matra')->dropDownList([ 'Darat' => 'Darat', 'Laut' => 'Laut', 'Udara' => 'Udara', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
