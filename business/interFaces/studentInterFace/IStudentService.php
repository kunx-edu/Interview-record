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
}