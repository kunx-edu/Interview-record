<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/17
 * Time: 23:00
 */

namespace common\helper;


class ConstHelper
{
    //手机号的正则.
    CONST MOBILE_REGEX = '/^0?(13|15|18|14|17)[0-9]{9}$/';
    //邮箱的正则.
    CONST EMAIL_REGEX  = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

    //用户未删除.
    CONST USER_NOT_DELETE  = 0;
    //用户已经被删除.
    CONST USER_DELETE      = 1;

    //帐号类型.
    CONST USER_TYPE_MOBILE   = 'mobile';
    CONST USER_TYPE_EMAIL    = 'email';
    CONST USER_TYPE_UNKNOWN  = 'unknown';

    //密码强度.
    CONST USER_PASSWORD_REGEX = '/^(?=.*?[a-zA-Z])(?=.*?[0-9])[a-zA-Z0-9]{8,}$/';
    CONST PASSWORD_YES = 0;
    CONST PASSWORD_NO  = 1;

    //验证码状态.
    CONST CAPTCHA_NO   = 0;
    CONST CAPTCHA_YES  = 1;

    //注册状态.
    CONST REGISTER_SUCCESS = 1;
    CONST REGISTER_ERROR   = 0;

}