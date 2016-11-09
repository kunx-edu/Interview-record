<?php

namespace common\helper;

use Yii;
use common\helper\ConstHelper;

class Helper {

    public static function getService($serviceName)
    {
        return Yii::$container->get($serviceName.'Service');
    }

    /**
     * 判断是否是手机号.
     * @param $str
     * @auth houzhongjian.
     */
    public static function isMobile($str)
    {
        return preg_match(ConstHelper::MOBILE_REGEX, $str);
    }

    //判断是否为邮箱.
    public static function isEmail($str)
    {
        return preg_match(ConstHelper::EMAIL_REGEX, $str);
    }

    public static function password($password)
    {
        return preg_match(ConstHelper::USER_PASSWORD_REGEX, $password);
    }
}