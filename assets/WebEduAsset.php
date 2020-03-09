<?php

namespace app\assets;

use yii\web\AssetBundle;

class WebEduAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/webEdu/assets/images/favicon.png',
        'http://fonts.googleapis.com/css?family=Open+Sans:300,400,700',
        'assets/webEdu/assets/css/bootstrap.min.old.css',
        'assets/webEdu/assets/css/font-awesome.min.css',
        'assets/webEdu/assets/css/bootstrap-theme.css',
        'assets/webEdu/assets/css/style.css',
        'assets/webEdu/assets/css/camera.css',
		

        

        
    ];
    public $js = [
        'assets/webEdu/assets/js/modernizr-latest.js',
        //'assets/webEdu/assets/js/jquery-1.11.1.min.js',
        'assets/webEdu/assets/js/jquery.min.js',
        'assets/webEdu/assets/js/fancybox/jquery.fancybox.pack.js',
        
        'assets/webEdu/assets/js/jquery.mobile.customized.min.js',
        'assets/webEdu/assets/js/jquery.easing.1.3.js',
        'assets/webEdu/assets/js/camera.min.js',
        'assets/webEdu/assets/js/bootstrap.min.old.js',
        'assets/webEdu/assets/js/custom.js',
		
		
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}