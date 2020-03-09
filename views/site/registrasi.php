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
                    <p><?php echo Yii::$app->session->getFlash('daftarFormSubmitted'); ?></p> 
					
				</div>
                <!--Membuat garis-->
                <hr>
            </div>
            <!--/#table-container-->
<?php //else :
		}else{ ?>
            <div class="home-daftar">
                <h3 class="page-header"><?= Html::encode($this->title) ?></h3>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="tab1" class="nav nav-tabs">
                            <li><a href="#tab1-item1" data-toggle="tab">Petunjuk Pendaftaran</a></li>
                            <li class="active"><a href="#tab1-item2" data-toggle="tab">Form Pendaftaran</a></li>
                        </ul>
							<div class="tab-content">
                                <div class="tab-pane fade" id="tab1-item1">
                                        <h3>Petunjuk Pendaftaran Komponen Cadangan</h3>
                                </div>
                                <div class="tab-pane fade active in" id="tab1-item2">
									<br>
									<div class="stepwizard">
										<div class="stepwizard-row setup-panel">
											<div class="stepwizard-step">
												<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
												<p>Data Pribadi</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
												<p>Data Orang Tua</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
												<p>Data Wilayah dan Matra</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
												<p>Data Pendidikan</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
												<p>Upload Data Lampiran</p>
											</div>
										</div>
									</div>
									<!--<form role="form">-->
									<?php $form = ActiveForm::begin([
											'options' => ['enctype' => 'multipart/form-data']
									]) ?>
										<div class="row setup-content" id="step-1">
											<div class="col-xs-12">
												<div class="col-md-12">
													<h3>Data Pribadi</h3>
													<br>
														<?= $form->field($datapribadi_model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'nik')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'tanggal_lahir')->textInput() ?>
														<?= $form->field($datapribadi_model, 'jenis_kelamin')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>
														<?= $form->field($datapribadi_model, 'agama')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'suku')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'kewarganegaraan')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'tinggi_badan')->textInput() ?>
														<?= $form->field($datapribadi_model, 'berat_badan')->textInput() ?>
														<?= $form->field($datapribadi_model, 'alamat')->textarea(['rows' => 2]) ?>
														<?= $form->field($datapribadi_model, 'kelurahan_desa')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'kecamatan')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'kabupaten')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'provinsi')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'domisili')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'kode_pos')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'nomer_telepon')->textInput(['maxlength' => true]) ?>
														<?= $form->field($datapribadi_model, 'jumlah_saudara_kandung')->textInput() ?>
														<?= $form->field($datapribadi_model, 'anak_ke_berapa')->textInput() ?>
														<?= $form->field($datapribadi_model, 'dari_jumlah_bersaudara')->textInput() ?>
													
													<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
												</div>
											</div>
										</div>
										<div class="row setup-content" id="step-2">
											<div class="col-xs-12">
												<div class="col-md-12">
													<h3>Data Orang Tua</h3>
													<br>
													<?= $form->field($orangtua_model, 'nama_ayah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'nik_ayah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'pekerjaan_ayah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'tempat_lahir_ayah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'tanggal_lahir_ayah')->textInput() ?>
													<?= $form->field($orangtua_model, 'alamat_ayah')->textarea(['rows' => 2]) ?>
													<?= $form->field($orangtua_model, 'nomor_telepon_ayah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'nama_ibu')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'nik_ibu')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>
													<?= $form->field($orangtua_model, 'tempat_lahir_ibu')->textInput() ?>
													<?= $form->field($orangtua_model, 'tanggal_lahir_ibu')->textInput() ?>
													<?= $form->field($orangtua_model, 'alamat_ibu')->textarea(['rows' => 2]) ?>
													<?= $form->field($orangtua_model, 'nomor_telepon_ibu')->textInput(['maxlength' => true]) ?>
													
													
													<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
												</div>
											</div>
										</div>
										<div class="row setup-content" id="step-3">
											<div class="col-xs-12">
												<div class="col-md-12">
													<h3>Data Wilayah dan Matra</h3>
													<br>
													<?= $form->field($wilayahMatra_model, 'kodam')->textInput(['maxlength' => true]) ?>
													<?= $form->field($wilayahMatra_model, 'kodim')->textInput(['maxlength' => true]) ?>
													<?= $form->field($wilayahMatra_model, 'matra')->dropDownList([ 'Darat' => 'Darat', 'Laut' => 'Laut', 'Udara' => 'Udara', ], ['prompt' => '']) ?>
													<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
												</div>
											</div>
										</div>
										<div class="row setup-content" id="step-4">
											<div class="col-xs-12">
												<div class="col-md-12">
													<h3>Data Pendidikan</h3>
													<br>
													<?= $form->field($pendidikan_model, 'pendidikan_terakhir')->textInput(['maxlength' => true]) ?>
													<?= $form->field($pendidikan_model, 'nama_perguruan_tinggi_sekolah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($pendidikan_model, 'status_perguruan_tinggi_sekolah')->textInput(['maxlength' => true]) ?>
													<?= $form->field($pendidikan_model, 'program_studi_jurusan')->textInput(['maxlength' => true]) ?>
													<?= $form->field($pendidikan_model, 'akreditasi')->textInput(['maxlength' => true]) ?>
													<?= $form->field($pendidikan_model, 'ipk_nilai_un')->textInput() ?>
													
													<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
												</div>
											</div>
										</div>
										<div class="row setup-content" id="step-5">
											<div class="col-xs-12">
												<div class="col-md-12">
													<h3>Upload Data Lampiran</h3>
													<br>  
													<?= $form->field($datapribadi_model, 'surat_keterangan_sehat2')->fileInput(['class' => 'form-control']) ?>		
													<?= $form->field($datapribadi_model, 'ktp2')->fileInput(['class' => 'form-control']) ?>
													<?= $form->field($datapribadi_model, 'kk2')->fileInput(['class' => 'form-control']) ?>	
													<?= $form->field($datapribadi_model, 'ijazah_transkrip_nilai2')->fileInput(['class' => 'form-control']) ?>
													<?= $form->field($datapribadi_model, 'skck2')->fileInput(['class' => 'form-control']) ?>
													<?= $form->field($datapribadi_model, 'foto2')->fileInput(['class' => 'form-control']) ?>
													<span class="product-description pull-left">
														<small>File dokumen harus bertipe *.pdf atau *.jpg </small><br>
													</span>
														
													
													
													<!--<button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>-->
													<div class="form-group">
														<?= Html::submitButton('Daftar Komcad', ['class' => 'btn btn-success btn-lg pull-right', 'name' => 'daftar-button']) ?>
													</div>
												</div>
											</div>
										</div>
										
									<?php ActiveForm::end(); ?>
									<!--</form>-->
									
                                </div>
							</div>
						
                    </div>
                </div>
                <!--Membuat garis-->
                <hr>
            </div>
            <!--/#table-container-->

    <?php } ?>
