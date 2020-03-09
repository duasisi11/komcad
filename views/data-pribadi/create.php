<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadi */

//$this->title = 'Create Data Pribadi';
//$this->params['breadcrumbs'][] = ['label' => 'Data Komponen Cadangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="data-pribadi-create">

    <h1><?php ///Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'datapribadi_model' => $datapribadi_model,
		'orangtua_model' => $orangtua_model,
		'wilayahMatra_model' => $wilayahMatra_model,
		'pendidikan_model' => $pendidikan_model,
    ]) ?>

</div>
