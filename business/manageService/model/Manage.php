<?php

namespace business\manageService\model;

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
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
            [['mobile'], 'string', 'max' => 11],
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
}
