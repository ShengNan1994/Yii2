<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/css/site.css',
        'statics/css/main.css',
    ];
    public $js = [
        'statics/js/capecha.js',
        'statics/js/skel.min.js',
//        'statics/js/jquery.min.js',
        'statics/js/jquery.scrollex.min.js',
        'statics/js/util.js',
        'statics/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
