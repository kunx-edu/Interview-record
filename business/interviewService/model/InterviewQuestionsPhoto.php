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
            [['id'], 'required'],
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
}
