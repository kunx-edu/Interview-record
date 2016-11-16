<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    \frontend\assets\AddAsset::register($this);
    \frontend\assets\DateAsset::register($this);
    \frontend\assets\LayerAsset::register($this);
    \frontend\assets\DetailAsset::register($this);

    $this->title = "详细面试记录";
?>
<div class="container">
    <h1>面试记录</h1>
    <table class="table table-striped table-bordered detail-view">
        <tbody>
            <tr>
                <th class="col-md-2">面试公司</th>
                <td class="col-md-10"><?=$arr['company_name']?></td>
            </tr>
            <tr>
                <th class="col-md-2">面试人</th>
                <td class="col-md-10"><?=$arr['username']?></td>
            </tr>
            <tr>
                <th class="col-md-2">公司地址</th>
                <td class="col-md-10"><?=$arr['company_address']?></td>
            </tr>
            <tr>
                <th class="col-md-2">公司简介</th>
                <td class="col-md-10"><?=$arr['company_info']?></td>
            </tr>
            <tr>
                <th class="col-md-2">面试职位</th>
                <td class="col-md-10"><?=$arr['occupation']?></td>
            </tr>
            <tr>
                <th class="col-md-2">选择班级</th>
                <td class="col-md-10"><?=$arr['class_name']?></td>
            </tr>
            <tr>
                <th class="col-md-2">公司类型</th>
                <td class="col-md-10"><?=$arr['company_type']?></td>
            </tr>
            <tr>
                <th class="col-md-2">要求薪水</th>
                <td class="col-md-10"><?=$arr['salary']?></td>
            </tr>
            <tr>
                <th class="col-md-2">面试时间</th>
                <td class="col-md-10"><?=$arr['interview_time']?></td>
            </tr>
            <tr>
                <th class="col-md-2">面试记录</th>
                <td class="col-md-10"><?=$arr['interview_info']?></td>
            </tr>
            <tr>
                <th class="col-md-2">是否有笔试</th>
                <td class="col-md-10"><?=$arr['is_written_examination']?></td>
            </tr>
            <tr>
                <th class="col-md-2">笔试题照片</th>
                <td class="col-md-10">
                <?php
                    if (!empty($arr['photo'])) {
                        echo '<div>';
                        foreach ($arr['photo'] as $k => $v) {
                            echo "<a href='".$v['path']."' target='_blank'><img src='".$v['url']."' class='img-thumbnail'></a>";
                        }
                        echo '</div>';
                    } else {
                        echo '<div>无</div>';
                    }
                ?>
                </td>
            </tr>
            <tr>
                <th class="col-md-2">录音文件</th>
                <td class="col-md-10">
                <?php
                    if (!empty($arr['sound_recording_file'])) {
                        echo '<a href="'.$arr['sound_recording_file'].'">录音文件</a>';
                    } else {
                        echo '<div>无</div>';
                    }
                ?>
                </td>
            </tr>
            <tr>
                <th class="col-md-2">面试评分</th>
                <td class="col-md-10"><?= $arr['grade']; ?></td>
            </tr>
        </tbody>
    </table>
</div>