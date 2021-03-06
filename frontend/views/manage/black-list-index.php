<?php
$this->title = "公司黑名单";
use yii\helpers\Html;
\frontend\assets\BlacklistAsset::register($this);
\frontend\assets\LayerAsset::register($this);
?>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">公司黑名单</strong></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li><button type="button" class="button border-yellow" onclick="window.location.href='?r=manage/add-black-list'"><span class="icon-plus-square-o"></span> 添加黑名单</button></li>
            <li>搜索：</li>
            <li>
                <?= Html::beginForm('?r=manage/black-list','get', ['class'=>'form-inline']);?>
                <input type="text" name="keyword" value="<?= $keyword;?>" size="18" class="input" style="width:250px;height: 42px; line-height:17px;display:inline-block">
                <button class="button border-main icon-search" type="submit"> 搜索</button>
                <?= Html::endForm(); ?>
            </li>
        </ul>
    </div>
    <table class="table table-hover text-center">
        <tbody><tr>
            <th width="10%">ID</th>
            <th width="20%">公司名称</th>
            <th width="15%">操作</th>
        </tr>

        <?php
    if (!empty($arr)) {
        foreach ($arr as $K => $v) {
            echo '<tr>';
            echo '<td>'.$v['id'].'</td>';
            echo '<td>'.$v['name'].'</td>';
            echo '<td><div class="button-group"><button class="button border-main del" href="?r=manage/del-black-list&id='.$v['id'].'"><span class="icon-edit"></span>删除</button></div></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3" align="center">暂时没有数据</td></tr>';
    }
    ?>
        </tbody>
    </table>
</div>