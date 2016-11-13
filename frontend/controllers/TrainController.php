<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use frontend\core\base\BaseController;
use frontend\models\Train;
use Yii;


/**
 * 继承了frontend下面的基础控制器.
 * Class TrainController
 * @package frontend\controllers
 */
class TrainController extends BaseController
{
    /**
     * 显示培训机构的列表.
     * @return string
     */
    public function actionIndex()
    {
        //接收传递过来的关键字.
        $keyword = Yii::$app->request->get('keyword');

        //查询所有的培训机构.
        $res = Helper::getService('Train.Train')->getTrainAll($keyword);

        return $this->render('index', ['keyword'=>$keyword, 'arr'=>$res]);
    }

    /**
     * 添加培训机构.
     */
    public function actionAdd()
    {
        $model = new Train();
        return $this->render('add', ['model'=>$model]);
    }

    /**
     * 添加培训公司的主方法.
     */
    public function actionAddTrain()
    {
        //接收发送过来的数据.
        $data = Yii::$app->request->getBodyParams();

        $model = new Train();
    }
}