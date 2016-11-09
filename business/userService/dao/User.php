<?php

namespace business\userService\dao;

use Yii;
use common\helper\ConstHelper;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $account
 * @property string $password
 * @property string $face
 * @property integer $create_time
 * @property integer $delete
 * @property string $username
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'delete'], 'integer'],
            [['account'], 'string', 'max' => 20],
            [['password', 'username'], 'string', 'max' => 32],
            [['face'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'Account',
            'password' => 'Password',
            'face' => 'Face',
            'create_time' => 'Create Time',
            'delete' => 'Delete',
            'username' => 'Username',
        ];
    }

    /**
     * 验证帐号唯一性 包括 (是否被删除).
     * 调用情况：
     * 1.注册 UserRegisterForm有调用.
     * @auth houzhongjian.
     */
    public function accountUnique($account)
    {
        $res = $this->find()->where(['account'=>$account, 'delete'=>ConstHelper::USER_NOT_DELETE])->one();
        return $res;
    }

    /**
     * 注册的方法.
     * @param $userData => ['account','password'].
     * @return mixed.
     * @auth houzhongjian.
     */
    public function register($userData)
    {
        $model = new User();
        $model->setAttributes($userData);
        $model->changePassword();
        $id = $model->getPrimaryKey();
        return $id;
    }

    public function changePassword($runValidation = true, $attributeNames = null) {
        $password = md5(($this->password));
        $this->password = $password;
        return $this->save($runValidation, $attributeNames);
    }
}
