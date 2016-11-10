<?php

namespace frontend\models;

use Yii;

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
class StudentLoginForm extends \yii\db\ActiveRecord
{
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
            ['email','required','message'=>'邮箱不能为空'],
            ['password','required','message'=>'密码不能为空'],

            ['email','checkEmail']
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

    public function checkEmail

    public function login()
    {

    }
}
