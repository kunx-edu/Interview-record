<?php
namespace frontend\core\filters;

use common\helper\Helper;
use yii\base\ActionFilter;
use Yii;

/**
 * 过滤器.
 * Class UserFilter
 * @package admin\core\filters
 */
class UserFilters extends ActionFilter
{

    public function beforeAction($action)
    {
        //验证用户是否登录.
        $session = Helper::getSession('student');

        if (empty($session)) {
            return Helper::redirect('?r=login');
        }

        return parent::beforeAction($action);
    }
}
