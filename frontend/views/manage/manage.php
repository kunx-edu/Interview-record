<?php
$this->title = "管理员列表";
use yii\helpers\Html;
?>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 管理员列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='?r=manage/add'"><span class="icon-plus-square-o"></span> 添加管理员</button>
    </div>
    <table class="table table-hover text-center">
        <tbody><tr>
            <th width="10%">ID</th>
            <th width="20%">图片</th>
            <th width="15%">名称</th>
            <th width="15%">操作</th>
        </tr>

        <?php
            foreach ($arr as $k => $v) {
                echo '<tr>';
                echo '<td>'.$v['id'].'</td>';
                echo '<td>'.$v['username'].'</td>';
                echo '<td>'.$v['mobile'].'</td>';
                echo '<td><div class="button-group"><a class="button border-main" href="?r=manage/edit-manage&id='.$v['id'].'"><span class="icon-edit"></span> 修改</a></div></td>';
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
</div>