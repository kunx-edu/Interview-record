<?php
/**
 * Created by PhpStorm.
 * User: office
 * Date: 2016/11/14
 * Time: 0:54
 */

namespace business\interFaces\manageInterFace;
interface IManageService {
    public function login($username);

    /**
     * 显示管理员列表.
     * @return mixed
     */
    public function getManageAll();

    /**
     * 查询管理员信息.
     * @param $username
     * @return mixed
     */
    public function getManageByUsername($username);

    /**
     * 添加管理员.
     * @param $data
     * @return mixed
     */
    public function add($data);

    /**
     * 根据id来查询数据.
     * @param $id
     * @return mixed
     */
    public function getManageById($id);

    /**
     * 修改.
     * @param $data
     * @return mixed
     */
    public function update($data);
}