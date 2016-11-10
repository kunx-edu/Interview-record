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

    /**
     * 用来验证是否为邮箱地址.
     * @param $email
     * @return bool
     */
    public static function isEmail($email)
    {
        if (preg_match(ConstHelper::EMAIL_REGEX, $email)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getService($serviceName)
    {
        return Yii::$container->get($serviceName.'Service');
    }

}