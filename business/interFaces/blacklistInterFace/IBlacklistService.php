<?php

/**
 * 黑名单公司接口.
 * Interface IBlocklistService
 */
namespace business\interFaces\blacklistInterFace;
interface IBlacklistService {

    /**
     * 查询黑名单公司列表.
     * @return mixed
     */
    public function getBlackList($keyword);

    /**
     * 查询是否已经存在.
     * @param $name
     * @return mixed
     */
    public function getBlack($name);

    /**
     * 根据id删除黑名单公司.
     * @param $id
     * @return mixed
     */
    public function del($id);

    /**
     * 查询出所有的待审核的黑名单和培训公司.
     * @return mixed
     */
    public function getNotValidateAll();

    /**
     * 审核是否通过.
     * @param $id
     * @param $status
     * @return mixed
     */
    public function excamine($id, $status);

}