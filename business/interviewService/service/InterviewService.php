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
//        echo '<pre>';
//        var_dump($data);
//        exit;
        $tran = Yii::$app->db->beginTransaction();
        try{
            //开启事物因为要操作多张表.
            //1.添加面试信息.
            $interview = new Interview();
            $interview->setAttributes($data['Interview']);
            $interview->save();
            echo '<pre>';
            var_dump($interview->getErrors());
            exit;
            //2.添加面试题图片.
            //判断是否有上传面试题图片.
            if (!empty($data['InterviewQuestionsPhoto'])) {
                $interviewPhoto = new InterviewQuestionsPhoto();
                $interviewPhoto->setAttributes($data['InterviewQuestionsPhoto']);
                $interviewPhoto->save();
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