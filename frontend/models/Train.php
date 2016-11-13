<?php

namespace frontend\models;

use common\helper\Helper;
use Yii;

/**
 * This is the model class for table "train".
 *
 * @property integer $id
 * @property string $train_name
 * @property integer $is_delete
 * @property integer $is_validate
 */
class Train extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'train';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['train_name', 'required', 'message'=>'培训机构名称不能为空'],
            ['train_name', 'CheckTrainName'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'train_name' => 'Train Name',
            'is_delete' => 'Is Delete',
            'is_validate' => 'Is Validate',
        ];
    }

    /**
     * 添加的主方法.
     */
    public function add($data)
    {
        if ($this->validate()) {

            //添加到数据库.
            $res = Helper::getService('Train.Train')->add($data);

            if ($res) {
                return true;
            } else {
                $this->addError('train_name', '添加失败');
                return false;
            }

        } else {
            return false;
        }
    }

    /**
     * 检查是否已经存在该机构.
     * @param $attribute
     */
    public function CheckTrainName($attribute)
    {
        //查询是否已经存在.
        $res = Helper::getService('Train.Train')->getTrain($this->$attribute);

        if (!empty($res)) {
            $this->addError('train_name', '该培训机构已经存在');
        }
    }
}
