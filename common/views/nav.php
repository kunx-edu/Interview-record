<?php
    use common\helper\ParamsHelper;
\common\assets\NavAsset::register($this);
?>
<div class="head">
    <div class="head_central">
        <i><img src="<?= ParamsHelper::getParam('resourceDomainName').'/img/logo1.png';?>" alt="logo" class="logo_img"></i>
        <i><ul class="nav_menu">
                <li><a>图片</a></li>
                <li><a>视频</a></li>
                <li><a>段子</a></li>
            </ul></i>
        <i class="fr">

        </i>
    </div>
</div>