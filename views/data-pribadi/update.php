<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadi */

$this->title = 'Update Data Pribadi: ' . $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Data Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_registrasi, 'url' => ['view', 'id' => $model->no_registrasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-pribadi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
