<?php

namespace business\blacklistService\model;

use Yii;

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
            [['is_delete', 'is_validate'], 'integer'],
            [['name'], 'string', 'max' => 30],
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

    /**
     * 查询列表.
     * @param $keyword
     * @return array
     */
    public function getBlackList($keyword)
    {
        $sql = 'SELECT * FROM `blacklist` WHERE 1 = 1 ';


        if (!empty($keyword)) {
            $sql .= " AND  `name` LIKE '%".$keyword."%'";
        }
        $sql .= " AND `is_delete` = 0 AND `is_validate` = 1";

        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $res;
    }
}
