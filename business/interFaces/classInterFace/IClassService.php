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

    /**
     * 查询所有的班级.
     * @return mixed
     */
    public function getClassAll();

    /**
     * 添加班级.
     * @param $data
     * @return mixed
     */
    public function add($data);

    /**
     * 根据id 来删除数据.
     * @param $id
     * @return mixed
     */
    public function del($id);
}