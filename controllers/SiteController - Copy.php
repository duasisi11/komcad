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

use app\models\UploadForm;

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
	
	
    public function actionRegistrasi()
    {
		$model = new RegistrasiForm();
		$upload_model = new UploadForm();

        $title = 'Pendaftaran Komponen Cadangan';
		//var_dump($model->load(Yii::$app->request->post()));exit;
		//var_dump(Yii::$app->request->post());exit;
		
		$model->surat_keterangan_sehat1 = UploadedFile::getInstance($model, 'surat_keterangan_sehat');
		$model->ktp1 = UploadedFile::getInstance($model, 'ktp');
		$model->kk1 = UploadedFile::getInstance($model, 'kk');
		$model->ijazah_transkrip_nilai1 = UploadedFile::getInstance($model, 'ijazah_transkrip_nilai');
		$model->skck1 = UploadedFile::getInstance($model, 'skck');
		$model->foto1 = UploadedFile::getInstance($model, 'foto');
			
		$no_registrasi = "REG-".time();
		
        if ($model->load(Yii::$app->request->post()) && $model->daftar($no_registrasi)) {
			
            //Melakukan penambahan setFlash pada session dengan nama 'daftarFormSubmitted'
            Yii::$app->session->setFlash('daftarFormSubmitted','Berhasil daftar dengan nomor registrasi : ');
            $this->redirect(array('site/registrasi', 'no_registrasi' => $no_registrasi));
			//return $this->refresh();
        }

        return $this->render('registrasi', [
            'title' => $title,
            'model' => $model,
            //'upload_model' => $upload_model,
        ]);
    }
	
}
