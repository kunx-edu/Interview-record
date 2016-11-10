<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DateAsset extends AppAsset
{
//
    public $css = [
        'css/jquery.cxcalendar.css',
    ];
    public $js = [
        'js/jquery.cxcalendar.js',
        'js/jquery.cxcalendar.languages.js',
        'js/jquery.cxcalendar.min.js',
    ];
}
