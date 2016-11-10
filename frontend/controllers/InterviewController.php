<?php
namespace frontend\controllers;
use frontend\core\base\BaseController;
use frontend\models\Interview;
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
        $model = new Interview();
        $type = Yii::$app->request->get('type');
        return $this->render('add', ['model'=>$model]);
    }
}