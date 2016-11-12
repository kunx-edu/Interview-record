<?php

namespace frontend\models;

use common\helper\Helper;
use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property integer $class_id
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
            ['company_name','required','message'=>'公司名称不能为空'],
            ['company_address','required','message'=>'公司地址不能为空'],
            ['occupation','required','message'=>'面试职位不能为空'],
            ['class_id','required','message'=>'班级不能为空'],
            ['company_type','required','message'=>'公司类型不能为空'],
            ['interview_time','required','message'=>'面试时间不能为空'],
            ['interview_info','required','message'=>'面试记录不能为空'],
            ['is_written_examination','required','message'=>'是否有笔试不能为空'],
            ['grade','required','message'=>'面试评分不能为空'],
//            [['company_name'], 'required'],
//            [['company_type', 'interview_time', 'student_id', 'is_written_examination', 'is_delete'], 'integer'],
//            [['interview_info'], 'string'],
//            [['grade'], 'number'],
//            [['company_name'], 'string', 'max' => 40],
//            [['company_address', 'salary', 'sound_recording_file'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * 添加面试记录的方法.
     */
    public function addInterview($data)
    {
        //验证.
        if ($this->validate()) {

            //保存面试记录到数据库.
            Helper::getService('Stu');

        } else {
            return false;
        }
    }
}
