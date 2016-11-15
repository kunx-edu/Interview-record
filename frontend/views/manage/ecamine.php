<?php
$this->title = "审核";
use yii\helpers\Html;
\frontend\assets\LayerAsset::register($this);
\frontend\assets\EcamineAsset::register($this);
?>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">培训机构</strong></div>
    <table class="table table-hover text-center">
        <tbody><tr>
            <th width="10%">ID</th>
            <th width="20%">公司名称</th>
            <th width="20%">类型</th>
            <th width="15%">操作</th>
        </tr>

        <?php
        if (!empty($arr)) {
            foreach ($arr as $K => $v) {
                echo '<tr>';
                echo '<td>'.$v['id'].'</td>';
                echo '<td>'.$v['name'].'</td>';
                echo '<td>'.$v['note'].'</td>';
                echo '<td><div class="button-group">
                                <button class="button border-main del pass" id="" href="?r=manage/ecamine-pass&type='.$v['type'].'&id='.$v['id'].'"><span class="icon-edit"></span>通过</button>
                                <button class="button border-red del pass" id="notPass" href="?r=manage/ecamine-not-pass&type='.$v['type'].'&id='.$v['id'].'"><span class="icon-edit"></span>不通过</button>
                          </div>
                      </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="3" align="center">暂时没有数据</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>