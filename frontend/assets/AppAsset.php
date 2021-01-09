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

        'css/jquery-ui.css',
        'css/bootstrap4.css',
        'css/style.css',
        'css/login.css',
        'css/styleDetail.css',
        'css/styleDetail2.css',
        'css/main.css',
        'css/custom.css',

    ];
    public $js = [
        // login
        'js/jquery-1.10.2.js',
        'js/jquery-ui.js',
        'js/jquery3.5.js',
        'js/bootstrap4.js',
        "vendor/jquery/jquery.min.js",
        "vendor/bootstrap/js/popper.js",
        "vendor/bootstrap/js/bootstrap.min.js",
        "vendor/select2/select2.min.js",
        "vendor/tilt/tilt.jquery.min.js",
        "js/main.js",
        'js/ajax.js',
        'js/sweetalert.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
