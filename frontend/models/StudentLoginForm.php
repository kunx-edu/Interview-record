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
            ['email','required','message'=>'邮箱不能为空'],
            ['password','required','message'=>'密码不能为空'],
            ['email','checkEmail'],
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
            $res = Helper::getService('Stu.Student')->login($data['email'], $data['password']);
            if (!$res) {
                $this->addError('email', '邮箱或者密码错误');
                return false;
            }

            //判断查询出来的密码与输入的密码是否相同.
            if ($res['password'] != md5($data['password'])) {
                $this->addError('email', '邮箱或者密码错误');
                return false;
            }
            //设置session.
            Yii::$app->session->set('student', $res);
            return true;
        } else {
            return false;
        }
    }
}
