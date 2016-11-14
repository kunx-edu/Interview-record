<?php
$this->title = "班级列表";
use yii\helpers\Html;
\frontend\assets\ClassAsset::register($this);
\frontend\assets\LayerAsset::register($this);
?>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 班级列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='?r=manage/add-class'"><span class="icon-plus-square-o"></span> 添加班级</button>
    </div>
    <table class="table table-hover text-center">
        <tbody><tr>
            <th width="10%">ID</th>
            <th width="20%">班级名称</th>
            <th width="15%">学科</th>
            <th width="15%">操作</th>
        </tr>

        <?php

            if (!empty($arr)) {
                foreach ($arr as $k => $v) {
                    echo '<tr>';
                    echo '<td>'.$v['id'].'</td>';
                    echo '<td>'.$v['class_name'].'</td>';
                    echo '<td>'.$v['subject'].'</td>';
                    echo '<td><div class="button-group"><button class="button border-main del" id="del" href="?r=manage/del-class&id='.$v['id'].'"><span class="icon-edit"></span>删除</button></div></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4" align="center">暂无班级信息</td></tr>';
            }
        ?>
        </tbody>
    </table>
</div>