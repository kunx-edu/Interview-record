<?php
/**
 * 班级service.
 */
namespace business\classService\service;

use business\classService\model\ClassForm;
use business\common\BaseService;
use business\interFaces\classInterFace\IClassService;
use yii\base\Exception;
use Yii;

class ClassService extends BaseService implements IClassService
{

    /**
     * 根据学科来查询班级.
     * @param $name
     * @return mixed
     */
    public function getClassByType($name)
    {
        try{
            $class = new ClassForm();
            $res = $class->getClassByType($name);
            return $res;
        } catch (Exception $e) {
            Yii::error($e->getMessage());
            return false;
        }
    }
}