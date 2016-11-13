<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    \frontend\assets\AddAsset::register($this);
    \frontend\assets\DateAsset::register($this);
    \frontend\assets\LayerAsset::register($this);

    $this->title = "详细面试记录";
?>
<div class="container add">
    <h3 id="overview-doctype">添加面试记录</h3>
        <div class="form-group">
            <label for="company_name">公司名称:</label>
            <div><?=$arr['company_name']?></div>
        </div>
        <div class="form-group">
            <label for="company_address">公司地址:</label>
            <div><?=$arr['company_address']?></div>
        </div>

        <div class="form-group">
            <label for="company_info">公司简介:</label>
            <div><?=$arr['company_info']?></div>
        </div>

        <div class="form-group">
            <label for="occupation">面试职位:</label>
            <div><?=$arr['occupation']?></div>
        </div>
        <div class="form-group">
            <label for="class">选择班级:</label>
            <div><?=$arr['class_name']?></div>
        </div>

        <div class="form-group">
            <label for="company_type">公司类型:</label>
            <div><?=$arr['company_type']?></div>
        </div>
        <div class="form-group">
            <label for="salary">要求薪水</label>
            <div><?=$arr['salary']?></div>
        </div>

        <div class="form-group">
            <label for="interview_time">面试时间</label>
            <div><?=$arr['interview_time']?></div>
        </div>

        <div class="form-group">
            <label for="interview_time">面试记录</label>
            <div><?=$arr['interview_info']?></div>
        </div>

        <div class="form-group">
            <label for="is_written_examination">是否有笔试</label>
            <div><?=$arr['is_written_examination']?></div>
        </div>

        <div class="form-group">
            <label for="is_written_examination">笔试题照片</label>
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
        </div>

        <div class="form-group">
            <label for="sound_recording_file">录音文件</label><br/>
            <?php
                if (!empty($arr['sound_recording_file'])) {
                    echo '<a href="'.$arr['sound_recording_file'].'">录音文件</a>';
                } else {
                    echo '<div>无</div>';
                }
            ?>
        </div>

        <div class="form-group">
            <label for="grade">面试评分</label>
            <div><?= $arr['grade']; ?></div>
        </div>

</div>