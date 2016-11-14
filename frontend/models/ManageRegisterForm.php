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
class ManageRegisterForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $rePassword;
    public $username;
    public $password;
    public $mobile;

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
//            [['username'], 'string', 'max' => 20],
//            [['password'], 'string', 'max' => 32],
//            [['mobile'], 'string', 'max' => 11],
            ['username', 'required', 'message'=>'用户名不能为空'],
            ['password', 'required', 'message'=>'密码不能为空'],
            ['rePassword', 'required', 'message'=>'重复密码不能为空'],
            ['username', 'CheckUsername'],
            ['mobile', 'required', 'message'=>'手机不能为空'],
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
            'username' => 'Username',
            'password' => 'Password',
            'mobile' => 'Mobile',
        ];
    }

    public function add($data)
    {
        if ($this->validate()) {

            $res = Helper::getService('Manage.Manage')->add($data['ManageRegisterForm']);

            if (!$res) {
                $this->add('username', '添加失败');
                return false;
            }

            return true;

        } else {
            return false;
        }
    }

    public function CheckUsername($attribute)
    {
        $res = Helper::getService('Manage.Manage')->getManageByUsername($this->$attribute);

        if (!empty($res)) {
            $this->addError('username', '该管理员已经存在');
            return false;
        }
    }
}
