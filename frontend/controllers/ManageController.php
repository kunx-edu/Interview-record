<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use frontend\core\base\BaseManageController;
use frontend\models\Blacklist;
use frontend\models\Manage;
use frontend\models\ManageRegisterForm;
use frontend\models\Train;
use Yii;


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
    public function actionTrain()
    {
        $this->layout = 'manage';
        //接收传递过来的关键字.
        $keyword = Yii::$app->request->get('keyword');

        //查询所有的培训机构.
        $res = Helper::getService('Train.Train')->getTrainAll($keyword);

        return $this->render('train-index', ['keyword'=>$keyword, 'arr'=>$res]);
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

//        $model->scenario = 'add';
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
}