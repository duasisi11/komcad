<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pendidikans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pendidikan',
            'pendidikan_terakhir',
            'nama_perguruan_tinggi_sekolah',
            'status_perguruan_tinggi_sekolah',
            'program_studi_jurusan',
            //'akreditasi',
            //'ipk_nilai_un',
            //'no_registrasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
