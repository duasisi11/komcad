<?php

namespace app\assets;

use yii\web\AssetBundle;

class PluginAsset extends AssetBundle
{
    //public $sourcePath = '@vendor';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'assets/summernote-master/dist/summernote-bs4.css',
        // more plugin CSS here
    ];
    public $js = [
        'assets/summernote-master/dist/summernote-bs4.js',
        // more plugin Js here
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}