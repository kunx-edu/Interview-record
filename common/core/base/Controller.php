<?php
/**
 * 所有控制下面的基础控制器.
 */
namespace common\core\base;
use Yii;
class Controller extends \yii\web\Controller{

    protected function returnJson($arr)
    {
        return json_encode($arr);
    }

    public static function getService($serviceName)
    {
        return Yii::$container->get($serviceName.'Service');
    }
}