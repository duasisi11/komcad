<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-pribadi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kewarganegaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tinggi_badan')->textInput() ?>

    <?= $form->field($model, 'berat_badan')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kelurahan_desa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domisili')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomer_telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_saudara_kandung')->textInput() ?>

    <?= $form->field($model, 'anak_ke_berapa')->textInput() ?>

    <?= $form->field($model, 'dari_jumlah_bersaudara')->textInput() ?>
	
	<?= $form->field($model, 'surat_keterangan_sehat2')->fileInput(['class' => 'form-control']) ?>
	
	<?= $form->field($model, 'ktp2')->fileInput(['class' => 'form-control']) ?>
	
	<?= $form->field($model, 'kk2')->fileInput(['class' => 'form-control']) ?>

	<?= $form->field($model, 'ijazah_transkrip_nilai2')->fileInput(['class' => 'form-control']) ?>
	
	<?= $form->field($model, 'skck2')->fileInput(['class' => 'form-control']) ?>
	
	<?= $form->field($model, 'foto2')->fileInput(['class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
