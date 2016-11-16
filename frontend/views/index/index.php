<?php
    \frontend\assets\IndexAsset::register($this);
    $this->title = "面试";
?>
<div class="row" style="margin-top: 100px;">
    <h1 align="center" style="margin-bottom: 50px; font-family: '微软雅黑';">选择学科</h1>
    <div class="col-md-2"></div>
    <div class="col-md-2 selectXueke" data="java">
        <a href="?r=index/list&type=java" target="_blank">
            <img alt="Java培训" src="http://www.itsource.cn/img/new3/Javavideo.png" style="width:100%;">
            <p align="center" class="p">JAVA学科</p>
        </a>
    </div>
    <div class="col-md-2 selectXueke" data="php">
        <a href="?r=index/list&type=php" target="_blank">
            <img alt="PHP培训" src="http://www.itsource.cn/img/new3/PHPvideo.png"  style="width:100%;">
            <p align="center" class="p">PHP学科</p>
        </a>
    </div>
    <div class="col-md-2 selectXueke" data="ui">
        <a href="?r=index/list&type=ui" target="_blank">
            <img alt="UI设计培训" src="http://www.itsource.cn/img/new3/UIvideo.png"  style="width:100%;">
            <p align="center" class="p">UI学科</p>
        </a>
    </div>
    <div class="col-md-2 selectXueke" data="web">
        <a href="?r=index/list&type=web" target="_blank">
            <img alt="Web前端培训" src="http://www.itsource.cn/img/new3/vedio_web1.png"  style="width:100%;">
            <p align="center" class="p">Web前端学科</p>
        </a>
    </div>
    <div class="col-md-2"></div>
</div>