<?php
namespace frontend\controllers;
use common\helper\Helper;
use common\helper\UploadFactoryHelper;
use frontend\core\base\BaseController;
use frontend\models\ClassForm;
use frontend\models\Interview;
use frontend\models\InterviewQuestionsPhoto;
use Yii;

/**
 * 面试信息.
 * Class InfoController
 * @package frontend\controllers
 */
class InterviewController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 添加面试记录的方法.
     * @return string
     */
    public function actionAdd()
    {
        //获取学科.
        $subject = Yii::$app->request->get('type');

        //查询学科下面所有的班级.
        $classArr = Helper::getService('Class.Class')->getClassByType($subject);

        $model = new Interview();

        //实例化上传提交面试题的模型.
        $photo = new InterviewQuestionsPhoto();
        $type = Yii::$app->request->get('type');
        return $this->render('add', ['model'=>$model, 'photo'=>$photo, 'classArr'=>$classArr]);
    }

    public function actionUpload()
    {
        $upload = UploadFactoryHelper::Factory();
        $arr = $upload->uploadOne('in_photo');
        if ($arr['status']) {
            return json_encode(['status'=>'success','url'=>Yii::$app->params['upload_message']['visit_url'].$arr['url'].'!small', 'path'=>$arr['url']]);
        } else {
            return json_encode(['status'=>'error', 'message'=>$arr['message']]);
        }
    }

    public function actionAddInterview()
    {
        //获取post发送过来的数据.
        $data = Yii::$app->request->getBodyParams();

        //日期转换时间戳.
        $data['Interview']['interview_time'] = strtotime($data['Interview']['interview_time']);

        $model = new Interview();

        if ($model->load($data) && $model->addInterview($data)) {
            echo 'yes';
        } else {
            var_dump($model->getErrors());
        }
    }

    /**
     * 上传录音文件.
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionUploadTape()
    {
        $upload = UploadFactoryHelper::Factory();
        $arr = $upload->uploadOne('sound_recording_file', ['.amr','.wav']);

        if ($arr['status']) {
            return json_encode(['status'=>'success','url'=>Yii::$app->params['upload_message']['visit_url'].$arr['url']]);
        } else {
            return json_encode(['status'=>'error', 'message'=>$arr['message']]);
        }
    }
}