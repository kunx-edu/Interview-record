<?php
    $this->title = "面试信息";
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
    <tr>
        <td>1</td>
        <td>睿启新科技有限公司</td>
        <td>高新区</td>
        <td>3.5</td>
        <td>自主产品</td>
        <td>侯老司机</td>
        <td>10000</td>
        <td>2016-11-09</td>
        <td>详情 删除 修改</td>
    </tr>
    </tbody>

</table>