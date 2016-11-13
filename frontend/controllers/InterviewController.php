<?php
namespace frontend\controllers;
use common\helper\Helper;
use common\helper\UploadFactoryHelper;
use frontend\core\base\BaseController;
use frontend\models\ClassForm;
use frontend\models\Interview;
use frontend\models\InterviewQuestionsPhoto;
use Yii;
use yii\data\Pagination;

/**
 * 面试信息.
 * Class InfoController
 * @package frontend\controllers
 */
class InterviewController extends BaseController
{
    public function actionIndex()
    {
        //获取当前第几页.
        $pageNow = Yii::$app->request->get('page');
        if (empty($pageNow)) {
            $pageNow = 1;
        }

        //获取分页总条数.
        $rst = Helper::getService('Interview.Interview')->getInterviewCount();

        //查询面试数据.
        $res = Helper::getService('Interview.Interview')->getInterviewAll($pageNow);

        $pages = new Pagination(['totalCount' => count($rst), 'pageSize' =>  Yii::$app->params['pageSize']]);

        //获取当前登录用的id.
        return $this->render('index', [
            'arr'=>$res,
            'pages'=>$pages,
            'id'=>Yii::$app->session->get('student')['id'],
        ]);
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
        if (!empty($data['Interview']['interview_time'])) {
            $data['Interview']['interview_time'] = strtotime($data['Interview']['interview_time']);
        }

        $model = new Interview();

        if ($model->load($data) && $model->addInterview($data)) {
            return json_encode(['status'=>'success', 'data'=>$model->getErrors()]);
        } else {
            return json_encode(['status'=>'error', 'data'=>$model->getErrors()]);
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
        $arr = $upload->uploadOne('sound_recording_file',['.amr','.wav']);
        if ($arr['status']) {
            return json_encode(['status'=>'success','url'=>Yii::$app->params['upload_message']['visit_url'].$arr['url'], 'path'=>$arr['url']]);
        } else {
            return json_encode(['status'=>'error', 'message'=>$arr['message']]);
        }
    }

    /**
     * 详细.
     */
    public function actionDetail()
    {
        //获取传递过来的id.
        $id = Yii::$app->request->get('id');

        //根据id来查询.
        $arr = Helper::getService('Interview.Interview')->getInterviewById($id);

        return $this->render('detail', ['arr'=>$arr]);
    }

    /**
     * 搜索功能.
     */
    public function actionSearch()
    {
        //获取传递过来的关键词.
        $keyword = Yii::$app->request->get('keyword');

        //获取当前第几页.
        $pageNow = Yii::$app->request->get('page');
        if (empty($pageNow)) {
            $pageNow = 1;
        }

        //获取分页总条数.
        $rst = Helper::getService('Interview.Interview')->getInterviewCount($keyword);

        //查询面试数据.
        $res = Helper::getService('Interview.Interview')->getInterviewAll($pageNow, $keyword);

        $pages = new Pagination(['totalCount' => count($rst), 'pageSize' =>  Yii::$app->params['pageSize']]);

        //获取当前登录用的id.
        return $this->render('index', [
            'arr'=>$res,
            'pages'=>$pages,
            'id'=>Yii::$app->session->get('student')['id'],
            'keyword' => $keyword
        ]);
    }
}