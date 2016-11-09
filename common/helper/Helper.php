<?php
namespace common\helper;
use Yii;

/**
 * 帮助类.
 * Class InfoHelper
 * @package common\helper
 */
class Helper {

    /**
     * 使用Helper类获取session的方法.
     */
    public static function getSession($sesion)
    {
        return Yii::$app->session->get($sesion);
    }

    /**
     * 使用Helper类跳转的方法.
     */
    public static function redirect($url)
    {
        header("Location:".$url);
    }
}