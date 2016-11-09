<?php
namespace frontend\controllers;
use frontend\core\base\BaseController;

/**
 * 面试信息.
 * Class InfoController
 * @package frontend\controllers
 */
class InfoController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}