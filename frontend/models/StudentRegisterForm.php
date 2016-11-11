<?php

namespace frontend\models;

use common\helper\Helper;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $username
 * @property integer $class_id
 * @property integer $is_validate
 */
class StudentRegisterForm extends Model
{
    public $email;
    public $password;
    public $rePassword;
    public $username;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['class_id', 'is_validate'], 'integer'],
//            [['email', 'username'], 'string', 'max' => 20],
//            [['password'], 'string', 'max' => 32],
            ['email','required','message'=>'邮箱不能为空'],
            ['password', 'required', 'message'=>"密码不能为空"],
            ['rePassword', 'required', 'message'=>"确认密码不能为空"],
            ['username', 'required', 'message'=>"真实姓名不能为空"],
            ['username', 'CheckUsername'],
            ['email', 'CheckEmail'],
            ['password', 'CheckPassword'],
            ['rePassword','compare','compareAttribute'=>'password','message'=>'两次密码不一致'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'username' => 'Username',
            'class_id' => 'Class ID',
            'is_validate' => 'Is Validate',
        ];
    }

    /**
     * 注册的主方法.
     * @param $data
     */
    public function register($data)
    {
        if ($this->validate()) {
            $res = Helper::getService('Stu.Student')->register($data);
            return $res;
        } else {
            return false;
        }
    }

    /**
     * 检查用户名.
     */
    public function CheckUsername($attribute)
    {
        //判断姓名是否为汉字.
        if (!preg_match("/^[\x7f-\xff]+$/", $this->$attribute)) { //兼容gb2312,utf-8
            $this->addError('username', '真实姓名必须为汉字');
        }

        //判断姓名的长度.
        if (mb_strlen($this->$attribute, 'utf-8') < 2) {
            $this->addError('username', '真实姓名长度不够');
        }
        if (mb_strlen($this->$attribute, 'utf-8') > 4) {
            $this->addError('username', '真实姓名太长');
        }
    }

    /**
     * 检查邮箱.
     * @param $attribute
     */
    public function CheckEmail($attribute)
    {
        if(!Helper::isEmail($this->$attribute)){
            $this->addError($attribute, '邮箱格式错误');
        }
    }

    /**
     * 检查密码长度.
     */
    public function CheckPassword($attribute)
    {
        if (strlen($this->$attribute) < 6) {
            $this->addError('password', '密码长度不够');
        }
    }
}
