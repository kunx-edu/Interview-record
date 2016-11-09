<?php
/**
 * 获取params配置.
 * User: Administrator
 * Date: 2016/3/15
 * Time: 23:17
 */
namespace common\helper;
class ParamsHelper {

    /**
     * 获取params的配置参数.
     * @param $param
     * @auth houzhongjian.
     */
    public static function getParam($param)
    {
        $params = include \Yii::getAlias('@common').'/config/params.php';
        return $params[$param];
    }

}