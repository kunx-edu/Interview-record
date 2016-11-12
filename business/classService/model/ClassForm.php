<?php

namespace business\classService\model;

use Yii;

/**
 * This is the model class for table "class".
 *
 * @property integer $id
 * @property string $class_name
 * @property string $subject
 * @property integer $is_delete
 */
class ClassForm extends \yii\db\ActiveRecord
{
    public $id;
    public $class_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_delete'], 'integer'],
            [['class_name', 'subject'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Class Name',
            'subject' => 'Subject',
            'is_delete' => 'Is Delete',
        ];
    }

    /**
     * 根据学科来查询班级.
     * @param $name
     */
    public function getClassByType($name)
    {
        $res = $this->find()->where(['subject'=>$name])->asArray()->all();
        return $res;
    }
}
