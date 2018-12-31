<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap3-wysihtml5.min.css',
        'css/ionicons.min.css',
        'css/font-awesome.min.css',
        'css/skins/_all-skins.min.css',
    ];
    public $js = [
        'js/bootstrap3-wysihtml5.all.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
