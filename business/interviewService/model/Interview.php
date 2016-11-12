<?php

namespace business\interviewService\model;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $company_address
 * @property string $salary
 * @property integer $company_type
 * @property integer $interview_time
 * @property string $interview_info
 * @property integer $student_id
 * @property integer $is_written_examination
 * @property string $sound_recording_file
 * @property double $grade
 * @property integer $is_delete
 * @property string $company_info
 * @property string $occupation
 * @property integer $class_id
 */
class Interview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name'], 'required'],
            [['company_type', 'interview_time', 'student_id', 'is_written_examination', 'is_delete', 'class_id'], 'integer'],
            [['interview_info'], 'string'],
            [['grade'], 'number'],
            [['company_name'], 'string', 'max' => 40],
            [['company_address', 'salary', 'sound_recording_file', 'company_info'], 'string', 'max' => 255],
            [['occupation'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'company_address' => 'Company Address',
            'salary' => 'Salary',
            'company_type' => 'Company Type',
            'interview_time' => 'Interview Time',
            'interview_info' => 'Interview Info',
            'student_id' => 'Student ID',
            'is_written_examination' => 'Is Written Examination',
            'sound_recording_file' => 'Sound Recording File',
            'grade' => 'Grade',
            'is_delete' => 'Is Delete',
            'company_info' => 'Company Info',
            'occupation' => 'Occupation',
            'class_id' => 'Class ID',
        ];
    }

    /**
     * 添加.
     * @param $data
     * @return mixed
     */
    public function addInterview($data)
    {
        $this->setAttributes($data);
        $this->save();
        $id = $this->getPrimaryKey();
        return $id;
    }

}
