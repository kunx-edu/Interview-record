<?php
/**
 * 依赖注入.
 * User: Administrator
 * Date: 2016/3/17
 * Time: 17:01
 */
namespace business;

use Yii;

class BusinessInit {

    /**
     * 初始化所有后台服务.
     * @auth houzhongjian.
     */
    public function init()
    {
        $this->userService();
    }

    private function userService()
    {
        Yii::$container->setSingleton('User.UserRegisterService', 'business\userService\service\UserRegisterService');
    }
}