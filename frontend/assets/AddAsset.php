<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AddAsset extends AppAsset
{
//
    public $css = [
        'css/add.css',
    ];
    public $js = [
        'js/add.js',
        'http://misc.weijuyuan.com/vendor/uploadFile/js/jquery.form.js'
    ];
}
