<?php

/**
 * 面试接口.
 */
namespace business\interviewService\service;
use business\common\BaseService;
use business\interFaces\interviewInterFace\IInterviewService;
use business\interviewService\model\Interview;
use business\interviewService\model\InterviewQuestionsPhoto;
use common\helper\Helper;
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
            $data['Interview']['student_id'] = Yii::$app->session->get('student')['id'];
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

    /**
     * 查询数据.
     * @return mixed
     */
    public function getInterviewAll($pageNow, $keyword= null)
    {
        try{
            $interview = new Interview();
            $res = $interview->getInterviewAll($pageNow, $keyword);

            foreach ($res as $k => $v) {
                $res[$k]['grade'] = $v['grade'] / $v['count'];
                $res[$k]['interview_time'] = date('Y-m-d',$v['grade']);
                $res[$k]['company_type'] = Helper::changeCompanyType($v['company_type']);
            }

            return $res;
        } catch (Exception $e) {
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 获取分页总条数.
     * @return mixed
     */
    public function getInterviewCount($keyword = null)
    {
        try{
            $interview = new Interview();
            return $interview->getInterviewCount($keyword);
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 根据id来查询.
     * @param $id
     * @return mixed
     */
    public function getInterviewById($id)
    {
        try{
            $interview = new Interview();
            $res = $interview->getInterviewById($id);

            //查询图片.
            $iq = new InterviewQuestionsPhoto();
            $arr = $iq->getPhotoById($id);

            foreach ($arr as $k => $v) {
                $arr[$k]['url'] = Yii::$app->params['upload_message']['visit_url'].$v['url'].'!small';
                $arr[$k]['path'] = Yii::$app->params['upload_message']['visit_url'].$v['url'];
            }

            if (!empty($res['sound_recording_file'])) {
                $res['sound_recording_file'] = Yii::$app->params['upload_message']['visit_url'].$res['sound_recording_file'];
            }

            //将查询出来的图片添加到数数组中.
            $res['photo'] = $arr;

            $res['company_type'] = Helper::changeCompanyType($res['company_type']);

            $res['interview_time'] = date('Y-m-d', $res['interview_time']);

            $res['is_written_examination'] = Helper::changeInterview($res['is_written_examination']);

            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 根据学科来查询面试信息.
     * @param $subject
     * @return mixed
     */
    public function getListBySubject($subject, $keyword, $pageNow)
    {
        try{
            $interviewArr = new Interview();
            $arr = $interviewArr->getListBySubject($subject, $keyword, $pageNow);
            return $arr;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }

    /**
     * 获取学科面试的总条数.
     * @param $subject
     * @return mixed
     */
    public function getInterviewCountBySubject($subject, $keyword)
    {
        try{
            $interview = new Interview();
            $res = $interview->getInterviewCountBySubject($subject, $keyword);
            return $res;
        }catch (Exception $e){
            Yii::error($e->getMessage());
            return false;
        }
    }
}