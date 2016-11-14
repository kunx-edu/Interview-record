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
        Header("Location:".$url);
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

    /**
     * 替换公司类型.
     * @param $type
     * @return string
     */
    public static function changeCompanyType($company_type)
    {
        $type = '';
        switch($company_type) {
            case '0' : $type = '外包公司'; break;
            case '1' : $type = '自主产品'; break;
        }
        return $type;
    }

    /**
     * 是否笔试.
     * @param $type
     */
    public static function changeInterview($inter_type)
    {
        $type = '';
        switch($inter_type) {
            case '0' : $type = '没有笔试'; break;
            case '1' : $type = '有笔试'; break;
        }
        return $type;
    }

}