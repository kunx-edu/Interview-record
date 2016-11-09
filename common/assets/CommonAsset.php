<?php
namespace common\assets;

use yii\web\AssetBundle;

class CommonAsset extends AssetBundle
{
    public $baseUrl = '@resource';
    public $css = [
        'css/base.css',
    ];
    public $js = [
        'js/jquery.min.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
