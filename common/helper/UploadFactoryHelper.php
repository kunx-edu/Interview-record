<?php
/**
 * 上传类的工厂模式方法.
 */

namespace common\helper;
use Yii;
use yii\base\Exception;


class UploadFactoryHelper {

    private function __construct()
    {

    }

    /**
     * 具体的工厂方法.
     * @return mixed
     * @throws Exception
     */
    public static function Factory()
    {
        $class = Yii::$app->params['upload_message']['upload_class'];

        if (empty($class)) {
            throw new Exception("类{$class}不存在");
        }

        $object = new $class();
        return $object;
    }
}