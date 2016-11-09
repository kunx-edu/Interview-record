<?php
namespace frontend\core\filters;

use common\helper\InfoHelper;
use yii\base\ActionFilter;
use Yii;

/**
 * 过滤器.
 * Class UserFilter
 * @package admin\core\filters
 */
class UserFilter extends ActionFilter
{

    public function beforeAction($action)
    {
        //验证用户是否登录.
        $session = InfoHelper::getSession('emp');

        if (empty($session)) {
            return QipaHelper::redirect('?r=login');
        }

        return parent::beforeAction($action);
    }
}
