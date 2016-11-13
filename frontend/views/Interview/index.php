<?php
    $this->title = "面试信息";
use yii\widgets\LinkPager;
?>
<style>
    .search-box{
        background: #f8f8f8;
        border:1px solid #d8dce5;
        padding:10px 0px 10px 12px;
        -moz-border-radius: 8px;
        -webkit-border-radius: 8px;
        border-radius:8px;
        margin-bottom: 20px;
        min-width: 1145px;
    }
    </style>
    <div class="search-box">
        <!--查询条件-->
        <form class="form-inline" id="onlineProSearch">
            <div class="form-group">
                <input type="text" size="18" class="form-control ma-right" placeholder="公司名称">
                <button role="button" id="SeachButton" type="button"class="btn btn-primary">搜索</button>
                <a class="btn btn-primary" href="?r=index" target="_blank">添加面试记录</a>
            </div>
        </form>
    </div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>公司名称</th>
        <th>公司地址</th>
        <th>公司评分</th>
        <th>公司类型</th>
        <th>面试者</th>
        <th>要求薪水</th>
        <th>面试时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if (!empty($arr)) {

            foreach ($arr as $k=> $v) {
                echo '<tr>';
                echo '<td>'.$v['id'].'</td>';
                echo '<td>'.$v['company_name'].'</td>';
                echo '<td>'.$v['company_address'].'</td>';
                echo '<td>'.$v['grade'].'</td>';
                echo '<td>'.$v['company_type'].'</td>';
                echo '<td>'.$v['username'].'</td>';
                echo '<td>'.$v['salary'].'</td>';
                echo '<td>'.$v['interview_time'].'</td>';
                echo '<td>详情 删除 修改</td>';
                echo '</tr>';
            }
        }
    ?>
    </tbody>

</table>
<div class="container" style="text-align: center;"><?= LinkPager::widget(['pagination' => $pages]); ?></div>