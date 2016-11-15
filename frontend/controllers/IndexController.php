<?php

namespace frontend\controllers;

use common\core\base\Controller;
use common\helper\Helper;
use Yii;
use yii\data\Pagination;

/**
 * 继承了frontend下面的基础控制器.
 * Class IndexController
 * @package frontend\controllers
 */
class IndexController extends Controller
{
    /**
     * 显示选择学科的方法.
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        //查询某学科的面试信息.
        //接收get请求发送过来的参数.
        $subject = Yii::$app->request->get('type');

        //获取关键字.
        $keyword = Yii::$app->request->get('keyword');

        //获取当前第几页.
        $pageNow = Yii::$app->request->get('pageNow');
        if (empty($pageNow)) {
            $pageNow = 1;
        }

        //查询.
        $data = Helper::getService('Interview.Interview')->getListBySubject($subject, $keyword, $pageNow);

        //获取学科面试的总条数.
        $rst = Helper::getService('Interview.Interview')->getInterviewCountBySubject($subject, $pageNow);

        $pages = new Pagination(['totalCount' => count($rst), 'pageSize' =>  Yii::$app->params['pageSize']]);

        return $this->render('list',[
            'arr'=>$data,
            'keyword'=>$keyword,
            'pages'=>$pages,
        ]);
    }
}