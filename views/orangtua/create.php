<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orangtua */

$this->title = 'Create Orangtua';
$this->params['breadcrumbs'][] = ['label' => 'Orangtuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orangtua-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
