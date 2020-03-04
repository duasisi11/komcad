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
        'assets/webEdu/assets/css/bootstrap.min.css',
        'assets/webEdu/assets/css/font-awesome.min.css',
        'assets/webEdu/assets/css/bootstrap-theme.css',
        'assets/webEdu/assets/css/style.css',
        'assets/webEdu/assets/css/camera.css',

        // more CSS here


    /*<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> */

        
    ];
    public $js = [
        'assets/webEdu/assets/js/modernizr-latest.js',
        'assets/webEdu/assets/js/jquery.min.js',
        'assets/webEdu/assets/js/fancybox/jquery.fancybox.pack.js',
        
        'assets/webEdu/assets/js/jquery.mobile.customized.min.js',
        'assets/webEdu/assets/js/jquery.easing.1.3.js',
        'assets/webEdu/assets/js/camera.min.js',
        'assets/webEdu/assets/js/bootstrap.min.js',
        'assets/webEdu/assets/js/custom.js',

        // more Js here

    /*<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>*/

        
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}