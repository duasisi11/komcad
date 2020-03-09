<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadi */

$this->title = $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Data Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-pribadi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->no_registrasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->no_registrasi], [
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
            'no_registrasi',
            'nama_lengkap',
            'nik',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'suku',
            'kewarganegaraan',
            'tinggi_badan',
            'berat_badan',
            'alamat:ntext',
            'kelurahan_desa',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'domisili',
            'kode_pos',
            'nomer_telepon',
            'jumlah_saudara_kandung',
            'anak_ke_berapa',
            'dari_jumlah_bersaudara',
            'surat_keterangan_sehat',
            'ktp',
            'kk',
            'ijazah_transkrip_nilai',
            'skck',
            'foto',
        ],
    ]) ?>

</div>
