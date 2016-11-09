<?php
namespace common\assets;

use yii\web\AssetBundle;

class NavAsset extends AssetBundle
{
    public $baseUrl = '@resource';
    public $css = [
        'css/nav.css',
        'css/base.css',
    ];
    public $js = [
//        'js/jquery.min.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
