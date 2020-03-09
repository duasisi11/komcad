<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pribadis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pribadi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Pribadi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_registrasi',
            'nama_lengkap',
            'nik',
            'tempat_lahir',
            'tanggal_lahir',
            //'jenis_kelamin',
            //'agama',
            //'suku',
            //'kewarganegaraan',
            //'tinggi_badan',
            //'berat_badan',
            //'alamat:ntext',
            //'kelurahan_desa',
            //'kecamatan',
            //'kabupaten',
            //'provinsi',
            //'domisili',
            //'kode_pos',
            //'nomer_telepon',
            //'jumlah_saudara_kandung',
            //'anak_ke_berapa',
            //'dari_jumlah_bersaudara',
            //'surat_keterangan_sehat',
            //'ktp',
            //'kk',
            //'ijazah_transkrip_nilai',
            //'skck',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
