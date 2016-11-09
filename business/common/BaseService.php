<?php
/**
 * 所有Service层的基础类.
 * User: Administrator
 * Date: 2016/3/17
 * Time: 17:05
 */
namespace business\common;

use Yii;
class BaseService {

    /**
     * 获取service.
     * @param $serviceName
     * @auth houzhongjian.
     */
    protected function getService($serviceName)
    {
        return Yii::$container->get($serviceName.'Service');
    }
}