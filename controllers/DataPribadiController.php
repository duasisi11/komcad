<?php

namespace app\controllers;

use Yii;

use app\models\DataPribadi;
use app\models\Orangtua;
use app\models\WilayahMatra;
use app\models\Pendidikan;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * DataPribadiController implements the CRUD actions for DataPribadi model.
 */
class DataPribadiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DataPribadi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DataPribadi::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataPribadi model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DataPribadi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$model = new DataPribadi();
		$datapribadi_model = new DataPribadi();
		$orangtua_model = new Orangtua();
		$wilayahMatra_model = new WilayahMatra();
		$pendidikan_model = new Pendidikan();
		
		$no_registrasi = "REG-".time();
		
		//if ($model->load(Yii::$app->request->post())) {
		if (Yii::$app->request->isPost) {
			
			$datapribadi_model->surat_keterangan_sehat2 = UploadedFile::getInstance($datapribadi_model, 'surat_keterangan_sehat2');
			$datapribadi_model->ktp2 = UploadedFile::getInstance($datapribadi_model, 'ktp2');
			$datapribadi_model->kk2 = UploadedFile::getInstance($datapribadi_model, 'kk2');
			$datapribadi_model->ijazah_transkrip_nilai2 = UploadedFile::getInstance($datapribadi_model, 'ijazah_transkrip_nilai2');
			$datapribadi_model->skck2 = UploadedFile::getInstance($datapribadi_model, 'skck2');
			$datapribadi_model->foto2 = UploadedFile::getInstance($datapribadi_model, 'foto2');
			
			//var_dump($foto);exit;
			
			if($datapribadi_model->validate()){
				$datapribadi_model->no_registrasi=$no_registrasi;
				
				//var_dump($datapribadi_model->errors);exit;
				$datapribadi_model->save();
				if(!empty($datapribadi_model->surat_keterangan_sehat2) && !empty($datapribadi_model->ktp2) && !empty($datapribadi_model->kk2) &&
				!empty($datapribadi_model->ijazah_transkrip_nilai2) && !empty($datapribadi_model->skck2) && !empty($datapribadi_model->foto2)){
					
					$datapribadi_model->surat_keterangan_sehat2->saveAs('uploads/dokumen/1SUKETSHT/' . $no_registrasi.'_SUKETSHT.' . $datapribadi_model->surat_keterangan_sehat2->extension);
					$datapribadi_model->surat_keterangan_sehat=$no_registrasi.'_SUKETSHT.' . $datapribadi_model->surat_keterangan_sehat2->extension;
					
					$datapribadi_model->ktp2->saveAs('uploads/dokumen/2KTP/' . $no_registrasi.'_KTP.' . $datapribadi_model->ktp2->extension);
					$datapribadi_model->ktp=$no_registrasi.'_KTP.' . $datapribadi_model->ktp2->extension;
					
					$datapribadi_model->kk2->saveAs('uploads/dokumen/3KK/' . $no_registrasi.'_KK.' . $datapribadi_model->kk2->extension);
					$datapribadi_model->kk=$no_registrasi.'_KK.' . $datapribadi_model->kk2->extension;
					
					$datapribadi_model->ijazah_transkrip_nilai2->saveAs('uploads/dokumen/4IJAZAH/' . $no_registrasi.'_IJAZAH.' . $datapribadi_model->ijazah_transkrip_nilai2->extension);
					$datapribadi_model->ijazah_transkrip_nilai=$no_registrasi.'_IJAZAH.' . $datapribadi_model->ijazah_transkrip_nilai2->extension;
					
					$datapribadi_model->skck2->saveAs('uploads/dokumen/5SKCK/' . $no_registrasi.'_SKCK.' . $datapribadi_model->skck2->extension);
					$datapribadi_model->skck=$no_registrasi.'_SKCK.' . $datapribadi_model->skck2->extension;
					
					$datapribadi_model->foto2->saveAs('uploads/dokumen/6FOTO/' . $no_registrasi.'_FOTO.' . $datapribadi_model->foto2->extension);
					$datapribadi_model->foto=$no_registrasi.'_FOTO.' . $datapribadi_model->foto2->extension;
					
					$datapribadi_model->save(FALSE);
				}
			}
				var_dump($datapribadi_model->errors);exit;
				return $this->redirect(['view', 'id' => $no_registrasi]);
        }else{
			$title = 'Pendaftaran Komponen Cadangan';
			
			return $this->render('create', [
				'title' => $title,
				'datapribadi_model' => $datapribadi_model,
				'orangtua_model' => $orangtua_model,
				'wilayahMatra_model' => $wilayahMatra_model,
				'pendidikan_model' => $pendidikan_model,
			]);
		}
    }

    /**
     * Updates an existing DataPribadi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->no_registrasi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DataPribadi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataPribadi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DataPribadi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataPribadi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
