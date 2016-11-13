<?php

namespace business\interviewService\model;

use Yii;

/**
 * This is the model class for table "interview_questions_photo".
 *
 * @property integer $id
 * @property string $url
 * @property integer $student_id
 * @property integer $interview_id
 */
class InterviewQuestionsPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview_questions_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id'], 'required'],
            [['id', 'student_id', 'interview_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'student_id' => 'Student ID',
            'interview_id' => 'Interview ID',
        ];
    }

    /**
     * 添加图片.
     * @param $data
     * @return mixed
     */
    public function addIntervicePhoto($data)
    {
        $this->setAttributes($data);
        return $this->save();
    }

    /**
     * 根据id查询面试题图片.
     * @param $id
     */
    public function getPhotoById($id)
    {
        $sql = 'SELECT * FROM `interview_questions_photo` WHERE `interview_id` = :id';
        $res = Yii::$app->db->createCommand($sql)->bindValue(':id',$id)->queryAll();
        return $res;
    }
}
