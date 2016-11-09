<?php
/**
 * 注册的实现.
 * User: Administrator
 * Date: 2016/3/17
 * Time: 17:03
 */
namespace business\userService\service;

use business\common\BaseService;
use business\interFaces\userInterFace\IRegisterService;
use business\userService\dao\User;
use Yii;
use yii\base\Exception;
class UserRegisterService extends BaseService implements IRegisterService
{

    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * 注册的方法.
     * @param $userData => ['account','password'].
     * @return mixed.
     * @auth houzhongjian.
     */
    public function register($userData)
    {
        try{
            $res = $this->user->register($userData);
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 验证帐号是否存在或者已经被删除.
     * @param $account
     * @return mixed.
     * @auth houzhongjian.
     */
    public function accountUnique($account)
    {
        try{
            $res = $this->user->accountUnique($account);
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

}