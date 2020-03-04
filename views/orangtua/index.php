<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orangtuas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orangtua-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orangtua', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_orangtua',
            'nama_ayah',
            'nik_ayah',
            'pekerjaan_ayah',
            'tempat_lahir_ayah',
            //'tanggal_lahir_ayah',
            //'alamat_ayah:ntext',
            //'nomor_telepon_ayah',
            //'nama_ibu',
            //'nik_ibu',
            //'pekerjaan_ibu',
            //'tempat_lahir_ibu',
            //'tanggal_lahir_ibu',
            //'alamat_ibu:ntext',
            //'nomor_telepon_ibu',
            //'no_registrasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
