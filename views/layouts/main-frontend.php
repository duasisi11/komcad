<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

//---load assets 
use app\assets\AppAsset;
use app\assets\WebEduAsset;

//mendaftarkan assets 
AppAsset::register($this);
WebEduAsset::register($this);

//Settingan directory assets
$directoryAsset =  Yii::getAlias('@web').'/assets/webEdu/';
//print_r($directoryAsset);exit;

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">

	<?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<?php $this->beginBody() ?>

    <!--/# begin header nav/menu-->
         <!-- file index harus ada di folder layout -->   
        <?= $this->render(
                'frontend-header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>
    <!--/#header-->

    <!-- Content : /views/site/index.php-->
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <?= $content ?>
    </div>
    <!-- Content -->

    <!--/# begin footer-->
         <!-- file index harus ada di folder layout -->   
         <?= $this->render(
                'frontend-footer.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>
    <!--/#footer-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
