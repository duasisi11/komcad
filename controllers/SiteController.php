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
use app\models\UploadForm;

use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
	 
	 //--Setting layout
    //public $layout = 'main-frontend';
    public $layout = 'main';
	
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
		$uploadform_model = new UploadForm();

        $title = 'Pendaftaran Komponen Cadangan';
		$no_registrasi = "REG-".time();
		
		//var_dump($uploadform_model->load(Yii::$app->request->post()));exit;
		//var_dump(Yii::$app->request->isPost);exit;
			
		if (Yii::$app->request->isPost &&
		$datapribadi_model->validate() && $orangtua_model->validate() && $wilayahMatra_model->validate() && $pendidikan_model->validate() 
		&& $uploadform_model->upload_doc($no_registrasi)
		){
			$uploadform_model->surat_keterangan_sehat = UploadedFile::getInstance($uploadform_model, 'surat_keterangan_sehat');
			$uploadform_model->ktp = UploadedFile::getInstance($uploadform_model, 'ktp');
			$uploadform_model->kk = UploadedFile::getInstance($uploadform_model, 'kk');
			$uploadform_model->ijazah_transkrip_nilai = UploadedFile::getInstance($uploadform_model, 'ijazah_transkrip_nilai');
			$uploadform_model->skck = UploadedFile::getInstance($uploadform_model, 'skck');
			$uploadform_model->foto = UploadedFile::getInstance($uploadform_model, 'foto');
			
				//var_dump($surat_keterangan_sehat);exit;		
				$datapribadi_model->no_registrasi=$no_registrasi;
				$datapribadi_model->save();
				
				$orangtua_model->no_registrasi=$no_registrasi;
				$orangtua_model->save();
				
				$wilayahMatra_model->no_registrasi=$no_registrasi;
				$wilayahMatra_model->save();
				
				$pendidikan_model->no_registrasi=$no_registrasi;
				$pendidikan_model->save();
				
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
				'uploadform_model' => $uploadform_model,
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
