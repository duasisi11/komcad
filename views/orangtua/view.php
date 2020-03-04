<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orangtua */

$this->title = $model->id_orangtua;
$this->params['breadcrumbs'][] = ['label' => 'Orangtuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orangtua-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_orangtua], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_orangtua], [
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
            'id_orangtua',
            'nama_ayah',
            'nik_ayah',
            'pekerjaan_ayah',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat:ntext',
            'nomor_telepon_ayah',
            'nama_ibu',
            'nik_ibu',
            'pekerjaan_ibu',
            'tempat_lahir_ibu',
            'tanggal_lahir_ibu',
            'alamat_ibu',
            'no_telepon_ibu',
            'no_registrasi',
        ],
    ]) ?>

</div>
