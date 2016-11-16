<?php

namespace business\studentService\service;

use business\common\BaseService;
use business\interFaces\studentInterFace\IStudentService;
use business\studentService\model\Student;
use Yii;
use yii\base\Exception;
class StudentService extends BaseService implements IStudentService
{
    private $stu;

    public function __construct()
    {
        if (empty($this->stu)) {
            $this->stu = new Student();
        }
    }
//    /**
//     * 注册的方法.
//     * @param $userData => ['account','password'].
//     * @return mixed.
//     * @auth houzhongjian.
//     */
//    public function register($userData)
//    {
//        try{
//            $res = $this->user->register($userData);
//            return $res;
//        }catch (Exception $e){
//            Yii::error($e->getMessage());
//            return false;
//        }
//    }
//
//    /**
//     * 验证帐号是否存在或者已经被删除.
//     * @param $account
//     * @return mixed.
//     * @auth houzhongjian.
//     */
//    public function accountUnique($account)
//    {
//        try{
//            $res = $this->user->accountUnique($account);
//            return $res;
//        }catch (Exception $e){
//            Yii::error($e->getMessage());
//            return false;
//        }
//    }

    /**
     * 登录的接口.
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password)
    {
        //根据email来查询数据.
        $res = Student::findOne(['email'=>$email]);
        return $res;
    }

    /**
     * 注册的主方法.
     * 往tudent表中添加学生信息.
     * @param $data
     * @return mixed
     */
    public function register($data)
    {
        $data['password'] = md5($data['password']);
        unset($data['rePassword']);
        try{
            $id = $this->stu->add($data);
            return $id;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
    /**
     * 根据邮箱来查询学生信息.
     * @param $email
     * @return mixed
     */
    public function getStudentByEmail($email)
    {
        return Student::findOne(['email'=>$email]);
    }

    /**
     * 导入数据.
     * @param $data
     * @return mixed
     */
    public function import($data)
    {
        try{

        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}