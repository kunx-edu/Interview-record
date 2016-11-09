<?php
/**
 * 注册service的接口.
 * User: Administrator
 * Date: 2016/3/17
 * Time: 17:07
 */
namespace business\interFaces\userInterFace;
interface IRegisterService
{
    /**
     * 注册的方法.
     * @param $userData => ['account','password'].
     * @return mixed.
     * @auth houzhongjian.
     */
    public function register($userData);

    /**
     * 验证帐号是否存在或者已经被删除.
     * @param $account
     * @return mixed.
     * @auth houzhongjian.
     */
    public function accountUnique($account);

}