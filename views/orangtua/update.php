<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orangtua */

$this->title = 'Update Orangtua: ' . $model->id_orangtua;
$this->params['breadcrumbs'][] = ['label' => 'Orangtuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_orangtua, 'url' => ['view', 'id' => $model->id_orangtua]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orangtua-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
