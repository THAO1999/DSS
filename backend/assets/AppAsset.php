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
        'css/css/cssCommon.css',
        'vendor/fontawesome-free/css/all.min.css',
        'css/sb-admin-2.min.css',
        'css/css/styleDetail.css',
        'css/css/styleDetail2.css',

    ];
    public $js = [
        "vendor/jquery/jquery.min.js",
        "vendor/bootstrap/js/bootstrap.bundle.min.js",
        " vendor/jquery-easing/jquery.easing.min.js",
        "js/sb-admin-2.min.js",
        "vendor/chart.js/Chart.min.js",
        "js/demo/chart-area-demo.js",
        "js/demo/chart-pie-demo.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
