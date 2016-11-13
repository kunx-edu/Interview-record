<?php
$this->title = "黑名单公司";
use yii\widgets\LinkPager;
use yii\helpers\Html;
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
    <?= Html::beginForm('?r=black-list/index','get', ['class'=>'form-inline']);?>
    <div class="form-group">
        <input type="text" name="keyword" value="<?= $keyword;?>" size="18" class="form-control ma-right" placeholder="公司名称">
        <button role="button" id="SeachButton" type="submit"class="btn btn-primary">搜索</button>
        <a class="btn btn-primary" href="?r=black-list/add" target="_blank">添加黑名单</a>
    </div>
    <?= Html::endForm(); ?>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>公司名称</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($arr)) {
        foreach ($arr as $K => $v) {
            echo '<tr>';
            echo '<td>'.$v['id'].'</td>';
            echo '<td>'.$v['name'].'</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="2" align="center">暂时没有数据</td></tr>';
    }
    ?>
    </tbody>

</table>
<div class="container" style="text-align: center;"><?php //LinkPager::widget(['pagination' => $pages]); ?></div>