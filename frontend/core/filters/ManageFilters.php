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
class ManageFilters extends ActionFilter
{

    public function beforeAction($action)
    {
        //验证用户是否登录.
        $session = Helper::getSession('manage');

        if (empty($session)) {
            return Helper::redirect('?r=manage-login');
        }

        return parent::beforeAction($action);
    }
}
