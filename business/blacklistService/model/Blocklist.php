<?php

namespace business\blocklistService\model;

use Yii;

/**
 * This is the model class for table "blocklist".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_delete
 * @property integer $is_validate
 */
class Blocklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blocklist';
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
}
