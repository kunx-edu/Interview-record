<?php
/**
 * 面试记录的接口.
 */
namespace business\interFaces\interviewInterFace;

interface IInterviewService {

    /**
     * 添加面试信息.
     * @param $data
     * @return mixed
     */
    public function addInterview($data);

    /**
     * 查询数据.
     * @return mixed
     */
    public function getInterviewAll($pageNow, $keyword);


    /**
     * 获取分页总条数.
     * @return mixed
     */
    public function getInterviewCount($keyword);

    /**
     * 根据id来查询.
     * @param $id
     * @return mixed
     */
    public function getInterviewById($id);

    /**
     * 根据学科来查询面试信息.
     * @param $subject
     * @return mixed
     */
    public function getListBySubject($subject, $keyword, $pageNow);

    /**
     * 获取学科面试的总条数.
     * @param $subject
     * @return mixed
     */
    public function getInterviewCountBySubject($subject, $keyword);
}