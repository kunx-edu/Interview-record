<?php

/**
 * frontend目录下面的基础控制器.
 * frontend目录下面的所有控制器都需要继承该控制器.
 * 该类需要继承common下面的核心基础类.
 * Class BaseController
 */
namespace frontend\core\base;

use common\core\base\Controller;

class BaseController extends Controller
{

    public function __construct()
    {

    }
}