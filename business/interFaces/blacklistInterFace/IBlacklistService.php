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

}