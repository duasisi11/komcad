<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wilayah Matras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wilayah-matra-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wilayah Matra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_wilayah_matra',
            'kodam',
            'kodim',
            'matra',
            'no_registrasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
