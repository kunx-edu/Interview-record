<?php

namespace frontend\models;

use common\helper\Helper;
use Yii;

/**
 * This is the model class for table "manage".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $mobile
 */
class Manage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $rePassword;
    public static function tableName()
    {
        return 'manage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message'=>"用户名不能为空"],
            ['password', 'required', 'message'=>"密码不能为空"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function login($data)
    {
        if ($this->validate()) {

            //根据用户名来查询密码.
            $arr = Helper::getService('Manage.Manage')->login($data['Manage']['username']);

            if (empty($arr)) {
                $this->addError('username', '用户名或者密码错误');
                return false;
            }

            if ($arr['password'] != md5($data['Manage']['password'])) {
                $this->addError('username', '用户名或者密码错误');
                return false;
            }

            Yii::$app->session->set('manage', $arr);
            return true;

        } else {
          return false;
        }
    }

}
