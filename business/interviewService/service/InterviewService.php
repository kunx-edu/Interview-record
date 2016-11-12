<?php

/**
 * 面试接口.
 */
namespace business\interviewService\service;
use business\common\BaseService;
use business\interFaces\classInterFace\IInterviewService;
use business\interviewService\model\Interview;
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
        try{
            //1.添加面试信息.
            $interview = new Interview();
            $interview->setAttributes($data['Interview']);
            $interview->save();
            //2.添加面试题图片.
            //3添加录音文件.

        } catch(Exception $e) {
            Yii::error($e->getMessage());
            return false;
        }
    }
}