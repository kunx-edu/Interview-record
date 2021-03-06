<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use frontend\core\base\BaseManageController;
use frontend\models\Blacklist;
use frontend\models\ClassForm;
use frontend\models\Manage;
use frontend\models\ManageRegisterForm;
use frontend\models\Train;
use Yii;
use common\helper\UploadFactoryHelper;

/**
 * 继承了frontend下面的基础控制器.
 * Class TrainController
 * @package frontend\controllers
 */
class ManageController extends BaseManageController
{
    public function actionIndex()
    {
        $this->layout = 'manage';
        return $this->render('index');
    }

    public function actionBlackList()
    {
        $this->layout = 'manage';
        $keyword = Yii::$app->request->get('keyword');

        //查询黑名单.
        $arr = Helper::getService('blacklist.blacklist')->getBlacklist($keyword);

        return $this->render('black-list-index', ['keyword'=>$keyword, 'arr'=>$arr]);
    }

    public function actionManage()
    {
        $this->layout = 'manage';

        //显示管理员列表.
        $arr = Helper::getService('Manage.Manage')->getManageAll();

        return $this->render('manage', ['arr'=>$arr]);
    }

    /**
     * .
     * @return string
     */
    public function actionAdd()
    {
        //接收传递过来的id
        $this->layout = 'manage';
        $id = Yii::$app->request->get('id');
        $manage = new ManageRegisterForm();
        return $this->render('add-manage', ['manage'=>$manage]);
    }

    public function actionAddManage()
    {
        $data = Yii::$app->request->getBodyParams();

        $model = new ManageRegisterForm();

        $model->scenario = 'add';
        if ($model->load($data) && $model->add($data)) {
            return json_encode(['status'=>'success', 'data'=>$model->getErrors()]);
        } else {
            return json_encode(['status'=>'error', 'data'=>$model->getErrors()]);
        }
    }

    /**
     * 编辑.
     */
    public function actionEditManage()
    {
        $req = Yii::$app->request->method;

        if ($req == 'GET') {

            $this->layout = 'manage';
            //获取发送过来的id.
            $id = Yii::$app->request->get('id');

            //查询该管理员的数据.
            $res = Helper::getService('Manage.Manage')->getManageById($id);

            $model = new ManageRegisterForm();

            return $this->render('edit-manage', ['manage'=>$model,'data'=>$res]);

        } else {

            //获取传递过来的参数.
            $data = Yii::$app->request->getBodyParams();
            $model = new ManageRegisterForm();

            if ($model->load($data) && $model->updateData($data)) {
                return json_encode(['status'=>'success', 'data'=>$model->getErrors()]);
            } else {
                return json_encode(['status'=>'error', 'data'=>$model->getErrors()]);
            }
        }
    }

    public function actionClass()
    {
        $this->layout = 'manage';

        //查询所有的班级.
        $arr = Helper::getService('Class.Class')->getClassAll();
        return $this->render('class', ['arr'=>$arr]);
    }

    /**
     * 添加班级.
     */
    public function actionAddClass()
    {
        $method = Yii::$app->request->method;

        if ($method == 'GET') {
            $this->layout = 'manage';
            $class = new ClassForm();
            $subjectArr = ['java','php','ui','web'];
            return $this->render('add-class', ['class'=>$class, 'subjectArr'=>$subjectArr]);
        } else {
            //获取发送过来的数据.
            $data = Yii::$app->request->getBodyParams();
            $model = new ClassForm();

            if ($model->load($data) && $model->add($data)) {
                return json_encode(['status'=>'success', 'data'=>$model->getErrors(), 'url'=>'?r=manage/class']);
            } else {
                return json_encode(['status'=>'error', 'data'=>$model->getErrors()]);
            }
        }
    }

    /**
     * 删除.
     */
    public function actionDelClass()
    {
        //获取发送过来id.
        $id = Yii::$app->request->get('id');

        $res = Helper::getService('Class.Class')->del($id);

        if ($res) {
            return json_encode(['status'=>'success']);
        } else {
            return json_encode(['status'=>'error']);
        }
    }

    public function actionDelBlackList()
    {
        //获取发送过来id.
        $id = Yii::$app->request->get('id');

        $res = Helper::getService('blacklist.blacklist')->del($id);

        if ($res) {
            return json_encode(['status'=>'success']);
        } else {
            return json_encode(['status'=>'error']);
        }
    }

    public function actionAddBlackList()
    {
        $method = Yii::$app->request->method;

        if ($method == 'GET') {
            $this->layout = 'manage';
            $model = new Blacklist();
            return $this->render('add-black-list', ['model'=>$model]);
        } else {

            //接收发送过来的数据.
            $data = Yii::$app->request->getBodyParams();

            $model = new Blacklist();

            if ($model->load($data) && $model->add($data)) {
                return json_encode(['status'=>'success','data'=>$model->getErrors()]);
            } else {
                return json_encode(['status'=>'error', 'data'=>$model->getErrors()]);
            }
        }
    }

    public function actionTrain()
    {
        $this->layout = 'manage';
        //接收传递过来的关键字.
        $keyword = Yii::$app->request->get('keyword');

        //查询所有的培训机构.
        $res = Helper::getService('Train.Train')->getTrainAll($keyword);

        return $this->render('train-index', ['keyword'=>$keyword, 'arr'=>$res]);
    }

    public function actionDelTrain()
    {
        //获取发送过来id.
        $id = Yii::$app->request->get('id');

        $res = Helper::getService('Train.Train')->del($id);

        if ($res) {
            return json_encode(['status'=>'success']);
        } else {
            return json_encode(['status'=>'error']);
        }
    }

    public function actionAddTrain()
    {
        $method = Yii::$app->request->method;

        if ($method == 'GET') {
            $this->layout = 'manage';
            $model = new Train();
            return $this->render('add-train', ['model'=>$model]);
        } else {

            //接收发送过来的数据.
            $data = Yii::$app->request->getBodyParams();
            $data['Train']['is_validate'] = 1;

            $model = new Train();

            if ($model->load($data) && $model->add($data)) {
                return json_encode(['status'=>'success','data'=>$model->getErrors()]);
            } else {
                return json_encode(['status'=>'error', 'data'=>$model->getErrors()]);
            }
        }
    }

    public function actionExamine()
    {
        $this->layout = 'manage';
        //查询所有需要审核的内容.
        $arr = Helper::getService('blacklist.blacklist')->getNotValidateAll();

        return $this->render('ecamine', ['arr'=>$arr]);
    }

    //审核通过.
    public function actionEcaminePass()
    {
        //获取发送过来的参数.
        $data  = Yii::$app->request->get();

        //区分.
        if ($data['type'] == 'blacklist') {

            $res = Helper::getService('blacklist.blacklist')->excamine($data['id'], 1);
            if ($res) {
                return json_encode(['status'=>'success']);
            } else {
                return json_encode(['status'=>'error']);
            }

        } else if ($data['type'] == 'train') {
            $res = Helper::getService('Train.Train')->excamine($data['id'], 1);
            if ($res) {
                return json_encode(['status'=>'success']);
            } else {
                return json_encode(['status'=>'error']);
            }
        }
    }

    /**
     * 审核不通过.
     */
    public function actionEcamineNotPass()
    {
        //获取发送过来的参数.
        $data  = Yii::$app->request->get();

        //区分.
        if ($data['type'] == 'blacklist') {

            $res = Helper::getService('blacklist.blacklist')->excamine($data['id'], 2);
            if ($res) {
                return json_encode(['status'=>'success']);
            } else {
                return json_encode(['status'=>'error']);
            }

        } else if ($data['type'] == 'train') {
            $res = Helper::getService('Train.Train')->excamine($data['id'] ,2);
            if ($res) {
                return json_encode(['status'=>'success']);
            } else {
                return json_encode(['status'=>'error']);
            }
        }
    }

    /**
     * 导入学生.
     */
    public function actionImport()
    {
        $method = Yii::$app->request->method;

        if ($method == 'GET') {

            $this->layout = 'manage';

            return $this->render('import');
        } else if($method == 'POST') {

            require "../../vendor/PHPExcel/PHPExcel.php";

            $filePath = "C:/Users/office/Desktop/student.xlsx";

            $phpexcel = new \PHPExcel;
            $excelReader = \PHPExcel_IOFactory::createReader('Excel2007');
            $phpexcel = $excelReader->load($filePath)->getSheet(0);//载入文件并获取第一个sheet

            $total_line = $phpexcel->getHighestRow();
            $total_column = $phpexcel->getHighestColumn();

            for ($row = 2; $row <= $total_line; $row++) {
                $data = array();
                for ($column = 'A'; $column <= $total_column; $column++) {
                    $data[] = trim($phpexcel->getCell($column.$row) -> getValue());
                }
            }

            echo '<pre>';
            var_dump($data);
        }
    }

    public function actionImportData()
    {
        //获取发送过来的文件.
        $upload = UploadFactoryHelper::Factory();
        $arr = $upload->uploadOne('student', ['.xlsx','xls']);
        if ($arr['status']) {

            require "../../vendor/PHPExcel/PHPExcel.php";

            $filePath = "C:/Users/office/Desktop/student.xlsx";

            $phpexcel = new \PHPExcel;
            $excelReader = \PHPExcel_IOFactory::createReader('Excel2007');
            $phpexcel = $excelReader->load($filePath)->getSheet(0);//载入文件并获取第一个sheet

            $total_line = $phpexcel->getHighestRow();
            $total_column = $phpexcel->getHighestColumn();

            for ($row = 2; $row <= $total_line; $row++) {
                $data = array();
                for ($column = 'A'; $column <= $total_column; $column++) {
                    $data[] = trim($phpexcel->getCell($column.$row) -> getValue());
                }
            }

            //记录到数据库.
            Helper::getService('student.student')->import($data);

            return json_encode(['status'=>'success','url'=>Yii::$app->params['upload_message']['visit_url'].$arr['url']]);
        } else {
            return json_encode(['status'=>'error', 'message'=>$arr['message']]);
        }
    }
}