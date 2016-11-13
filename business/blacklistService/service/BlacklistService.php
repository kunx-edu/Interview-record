<?php
/**
 * 班级service.
 */
namespace business\blacklistService\service;

use business\classService\model\ClassForm;
use business\common\BaseService;
use business\interFaces\blacklistInterFace\IBlacklistService;
use yii\base\Exception;
use Yii;

class BlacklistService extends BaseService implements IBlacklistService
{

    /**
     * 查询黑名单公司列表.
     * @return mixed
     */
    public function getBlockList()
    {
        // TODO: Implement getBlockList() method.
    }
}