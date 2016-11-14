<?php

namespace frontend\models;

use common\helper\Helper;
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
            ['class_name', 'required', 'message'=>'学科不能为空'],
            ['subject', 'required', 'message'=>'学科不能为空'],
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

    public function add($data)
    {
        if ($this->validate()) {

            $res = Helper::getService('Class.Class')->add($data['ClassForm']);

            if (!$res) {
                $this->addError('class_name', '添加失败');
                return false;
            } else {
                return true;
            }

        } else {
            return false;
        }
    }
}
