<?php
/**
 * 依赖注入.
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
        $this->studentService();
    }

    private function studentService()
    {
        Yii::$container->setSingleton('Stu.StudentService', 'business\studentService\service\StudentService');
    }
}