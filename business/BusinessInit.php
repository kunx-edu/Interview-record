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
        $this->classService();
        $this->interviewService();
        $this->trainService();
        $this->blacklistService();
        $this->manageService();
    }

    private function studentService()
    {
        Yii::$container->setSingleton('Stu.StudentService', 'business\studentService\service\StudentService');
    }

    private function classService()
    {
        Yii::$container->setSingleton('Class.ClassService', 'business\classService\service\ClassService');
    }

    private function interviewService()
    {
        Yii::$container->setSingleton('Interview.InterviewService', 'business\interviewService\service\InterviewService');
    }

    private function trainService()
    {
        Yii::$container->setSingleton('Train.TrainService', 'business\trainService\service\TrainService');
    }

    private function blacklistService()
    {
        Yii::$container->setSingleton('blacklist.blacklistService', 'business\blacklistService\service\BlacklistService');
    }

    private function manageService()
    {
        Yii::$container->setSingleton('Manage.ManageService', 'business\manageService\service\ManageService');
    }
}