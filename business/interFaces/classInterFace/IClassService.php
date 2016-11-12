<?php
/**
 * 班级service的接口.
 */
namespace business\interFaces\classInterFace;
interface IClassService {

    /**
     * 根据学科来查询班级.
     * @param $name
     * @return mixed
     */
    public function getClassByType($name);
}