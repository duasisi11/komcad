<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use yii\bootstrap\ActiveForm;

use yii\captcha\Captcha;



//SQL Command library
use  yii\db\Command;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

        //cek apakah ada data yang disubmited dengan mengambil hasFlash('daftarFormSubmitted'); 
        //jika tidak ada data yang disubmit maka = bool(false), kemudian menampilkan form isian
        //jika ada maka = bool(true), kemudian menampilkan hasil proses inputan form isian

        //var_dump(Yii::$app->session->hasFlash('daftarFormSubmitted'));exit;
        if (Yii::$app->session->hasFlash('daftarFormSubmitted')) //:
        {
                    //berhasil input form
        ?>
            <h2><?= Html::encode($this->title) ?></h2>
            <div class="home-daftar">
                <div class="alert alert-success">
					<h4><i class="icon fa fa-check-circle"></i> Pendaftaran berhasil</h4>
                    <p>Segera lakukan verifikasi akun yang dikirim melalui <code>email</code>, kemudian login dan lengkapi data yang dibutuhkan.</p> 
					<div class="social text-center">
						<a href="https://mail.kemhan.go.id" target="_blank"><i class="fa fa-envelope"></i> Email Kemhan</a>
						<a href="https://mail.google.com" target="_blank"><i class="fa fa-envelope"></i> Gmail</a>
						<a href="https://mail.yahoo.com" target="_blank"><i class="fa fa-envelope"></i> Yahoo! Mail</a>
					</div>
				</div>
                <!--Membuat garis-->
                <hr>
            </div>
            <!--/#table-container-->
<?php //else :
        }else{ ?>
            <div class="home-daftar">
                <h2 class="page-header"><?= Html::encode($this->title) ?></h2>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="tab1" class="nav nav-tabs">
                            <li><a href="#tab1-item1" data-toggle="tab">Petunjuk</a></li>
                            <li class="active"><a href="#tab1-item2" data-toggle="tab">Form E-Registrasi</a></li>
                        </ul>
                        <div class="tab-content">
                                <div class="tab-pane fade" id="tab1-item1">
                                        <h3>Pendaftaran Komando Cadangan</h3>
                                </div>
                                <div class="tab-pane fade active in" id="tab1-item2">
                                
                                    <div class="contact-form bottom">
                                        <?php $form = ActiveForm::begin([
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

                                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                                'captchaAction' => 'home/captcha', //action ke controllernya 
                                                'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-10">{input}</div></div>',
                                            ]) ?>

                                            <div class="form-group">
                                                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'daftar-button']) ?>
                                            </div>

                                        <?php ActiveForm::end(); ?>

                                    </div>
                    
                                </div>
                        </div>
                    </div>
                </div>
                <!--Membuat garis-->
                <hr>
            </div>
            <!--/#table-container-->

    <?php } ?>
