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
class StudentLoginForm extends Model
{
    /**
     * @inheritdoc
     */
    public $email;
    public $password;

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
            ['email','checkEmail'],
//            ['password','required','message'=>'密码不能为空'],
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

    public function checkEmail($attribute)
    {
        if(!Helper::isEmail($this->$attribute)){
            $this->addError($attribute, '邮箱格式错误');
        }
    }

    /**
     * 登录主方法.
     */
    public function login($data)
    {
        //验证是否通过.
        if ($this->validate()) {
            return Helper::getService('Stu.Stusent')->login($data['email'], $data['password']);
        } else {
            return false;
        }
    }
}
