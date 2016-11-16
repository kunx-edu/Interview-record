<?php
/**
 * 学生service的接口.
 */
namespace business\interFaces\studentInterFace;
interface IStudentService
{
    /**
     * 登录的接口.
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password);

    /**
     * 登录的接口.
     * @param $data
     * @return mixed
     */
    public function register($data);

    /**
     * 根据邮箱来查询学生信息.
     * @param $email
     * @return mixed
     */
    public function getStudentByEmail($email);

    /**
     * 导入数据.
     * @param $data
     * @return mixed
     */
    public function import($data);
}