<?php

namespace frontend\models;

use Yii;
use common\helper\Helper;

/**
 * This is the model class for table "blacklist".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_delete
 * @property integer $is_validate
 */
class Blacklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blacklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name','required','message'=>'公司名称不能为空'],
            ['name','CheckName'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'is_delete' => 'Is Delete',
            'is_validate' => 'Is Validate',
        ];
    }

    public function add($data)
    {
        if ($this->validate()) {

            $res = Helper::getService('blacklist.blacklist')->add($data['Blacklist']);

            if ($res) {
                return true;
            } else {
                $this->addError('name', '添加失败');
                return false;
            }
        } else {
            return false;
        }
    }

    public function CheckName($attribute)
    {
        //查询是否已经存在.
        $res = Helper::getService('blacklist.blacklist')->getBlack($this->$attribute);

        if (!empty($res)) {
            $this->addError('name', '该公司已经存在');
        }
    }
}
