<?php

namespace business\trainService\model;

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
            [['is_delete', 'is_validate'], 'integer'],
            [['train_name'], 'string', 'max' => 40],
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
     * 查询数据.
     * @param $keyword
     * @return array
     */
    public function getTrainAll($keyword)
    {
        $sql = 'SELECT * FROM `train` WHERE 1 = 1 ';


        if (!empty($keyword)) {
            $sql .= " AND  `train_name` LIKE '%".$keyword."%'";
        }
        $sql .= " AND `is_delete` = 0 AND `is_validate` = 1";

        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $res;
    }

    /**
     * 根据名称来查询.
     * @param $tran_name
     * @return null|static
     */
    public function getTrain($tran_name)
    {
        $res = $this->findOne(['train_name'=>$tran_name, 'is_validate'=>1, 'is_delete'=>0]);
        return $res;
    }
}
