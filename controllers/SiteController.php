<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrasiForm;

use app\models\DataPribadi;
use app\models\Orangtua;
use app\models\WilayahMatra;
use app\models\Pendidikan;
use app\models\Lampiran;

use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
	 
	 //--Setting layout
    public $layout = 'main-frontend';
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	public function actionRegistrasi()
    {
		$datapribadi_model = new DataPribadi();
		$orangtua_model = new Orangtua();
		$wilayahMatra_model = new WilayahMatra();
		$pendidikan_model = new Pendidikan();
		$lampiran_model = new Lampiran();

        $title = 'Pendaftaran Komponen Cadangan';
		$no_registrasi = "REG-".time();
		
		//var_dump($model->load(Yii::$app->request->post()));exit;
		//var_dump(Yii::$app->request->post());exit;
		
			
		$surat_keterangan_sehat = UploadedFile::getInstance($lampiran_model, 'surat_keterangan_sehat');
		$ktp = UploadedFile::getInstance($lampiran_model, 'ktp');
		$kk = UploadedFile::getInstance($lampiran_model, 'kk');
		$ijazah_transkrip_nilai = UploadedFile::getInstance($lampiran_model, 'ijazah_transkrip_nilai');
		$skck = UploadedFile::getInstance($lampiran_model, 'skck');
		$foto = UploadedFile::getInstance($lampiran_model, 'foto');
			
		if ($datapribadi_model->load(Yii::$app->request->post()) && $orangtua_model->load(Yii::$app->request->post()) &&
		$wilayahMatra_model->load(Yii::$app->request->post()) && $pendidikan_model->load(Yii::$app->request->post()) &&
		$lampiran_model->load(Yii::$app->request->post()) &&
		$datapribadi_model->validate() && $orangtua_model->validate() &&
		$wilayahMatra_model->validate() && $pendidikan_model->validate()) {
			
				//var_dump($lampiran_model->errors);exit;		
				
					$datapribadi_model->no_registrasi=$no_registrasi;
					$datapribadi_model->save();
					
					$orangtua_model->no_registrasi=$no_registrasi;
					$orangtua_model->save();
					
					$wilayahMatra_model->no_registrasi=$no_registrasi;
					$wilayahMatra_model->save();
					
					$pendidikan_model->no_registrasi=$no_registrasi;
					$pendidikan_model->save();
					
					$lampiran_model->no_registrasi=$no_registrasi;
					$lampiran_model->save();
					
					if (!empty($surat_keterangan_sehat) && !empty($ktp) && !empty($kk) &&
						!empty($ijazah_transkrip_nilai) && !empty($skck) && !empty($foto)){
							
						$surat_keterangan_sehat->saveAs('uploads/dokumen/1SUKETSHT/' . $no_registrasi.'_SUKETSHT.' . $surat_keterangan_sehat->extension);
						$lampiran_model->surat_keterangan_sehat = $no_registrasi.'_SUKETSHT.' . $surat_keterangan_sehat->extension;
						
						$ktp->saveAs('uploads/dokumen/2KTP/' . $no_registrasi.'_KTP.' . $ktp->extension);
						$lampiran->ktp = $no_registrasi.'_KTP.' . $ktp->extension;
						
						$kk->saveAs('uploads/dokumen/3KK/' . $no_registrasi.'_KK.' . $kk->extension);
						$lampiran->kk = $no_registrasi.'_KK.' . $kk->extension;
						
						$ijazah_transkrip_nilai->saveAs('uploads/dokumen/4IJAZAH/' . $no_registrasi.'_IJAZAH.' . $ijazah_transkrip_nilai->extension);
						$lampiran->ijazah_transkrip_nilai = $no_registrasi.'_IJAZAH.' . $ijazah_transkrip_nilai->extension;
						
						$skck->saveAs('uploads/dokumen/5SKCK/' . $no_registrasi.'_SKCK.' . $skck->extension);
						$lampiran->skck = $no_registrasi.'_SKCK.' . $skck->extension;
						
						$foto->saveAs('uploads/dokumen/6FOTO/' . $no_registrasi.'_FOTO.' . $foto->extension);
						$lampiran->foto = $no_registrasi.'_FOTO.' . $foto->extension;
					
						$lampiran_model->no_registrasi=$no_registrasi;
						$lampiran_model->save(FALSE);
					}
				
			
				//$lampiran_model->save();
				//Melakukan penambahan setFlash pada session dengan nama 'daftarFormSubmitted'
				Yii::$app->session->setFlash('daftarFormSubmitted','Berhasil daftar dengan nomor registrasi : ');
				//$this->redirect(array('site/registrasi', 'no_registrasi' => $no_registrasi));
				return $this->refresh();
			
		}else{
			return $this->render('registrasi', [
				'title' => $title,
				'datapribadi_model' => $datapribadi_model,
				'orangtua_model' => $orangtua_model,
				'wilayahMatra_model' => $wilayahMatra_model,
				'pendidikan_model' => $pendidikan_model,
				'lampiran_model' => $lampiran_model,
			]);
		}
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
}
