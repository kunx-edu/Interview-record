<?php

namespace business\studentService\model;

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
class Student extends \yii\db\ActiveRecord
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
            [['class_id', 'is_validate'], 'integer'],
            ['email','string', 'max' => 40],
            ['username','string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
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
     * 添加用户信息.
     * @param $data
     */
    public function add($data)
    {
        $this->setAttributes($data);
        $this->save();
        $id = $this->getPrimaryKey();
//        var_dump($this->getErrors());
        return $id;
    }
}
