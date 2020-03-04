<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */

$this->title = $model->id_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pendidikan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pendidikan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pendidikan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pendidikan',
            'pendidikan_terakhir',
            'nama_perguruan_tinggi_sekolah',
            'status_perguruan_tinggi_sekolah',
            'program_studi_jurusan',
            'akreditasi',
            'ipk_nilai_un',
            'no_registrasi',
        ],
    ]) ?>

</div>
