<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ImportAsset extends AppAsset
{
    public $css = [
    ];
    public $js = [
        'js/import.js',
        'http://misc.weijuyuan.com/vendor/uploadFile/js/jquery.form.js'
    ];
}
