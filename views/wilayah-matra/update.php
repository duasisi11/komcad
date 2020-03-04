<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WilayahMatra */

$this->title = 'Update Wilayah Matra: ' . $model->id_wilayah_matra;
$this->params['breadcrumbs'][] = ['label' => 'Wilayah Matras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_wilayah_matra, 'url' => ['view', 'id' => $model->id_wilayah_matra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wilayah-matra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
