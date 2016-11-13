<?php

/**
 * 面试接口.
 */
namespace business\interviewService\service;
use business\common\BaseService;
use business\interFaces\interviewInterFace\IInterviewService;
use business\interviewService\model\Interview;
use business\interviewService\model\InterviewQuestionsPhoto;
use yii\base\Exception;
use Yii;

class InterviewService  extends BaseService implements IInterviewService
{

    /**
     * 添加面试信息.
     * @param $data
     * @return mixed
     */
    public function addInterview($data)
    {

        $tran = Yii::$app->db->beginTransaction();
        try{
            //开启事物因为要操作多张表.
            //1.添加面试信息.
            $interview = new Interview();
            $id = $interview->addInterview($data['Interview']);
            //2.添加面试题图片.
            //判断是否有上传面试题图片.
            if (!empty($data['InterviewQuestionsPhoto'])) {

                $session = Yii::$app->session->get('student');

                //组装数据.
                $data['InterviewQuestionsPhoto']['student_id'] = $session['id'];
                $data['InterviewQuestionsPhoto']['interview_id'] = $id;

                foreach ($data['InterviewQuestionsPhoto']['url'] as $K => $v) {

                    $interviewPhoto = new InterviewQuestionsPhoto();

                    //组装数据.
                    $arr = [
                        'url'          => $v,
                        'student_id'   => Yii::$app->session->get('student')['id'],
                        'interview_id' => $id,
                    ];

                    $interviewPhoto->addIntervicePhoto($arr);
                }
            }
            //3添加录音文件.

            //提交事物.
            $tran->commit();

            return true;

        } catch(Exception $e) {

            Yii::error($e->getMessage());
            //回滚事物.
            $tran->rollBack();
            return false;
        }
    }
}