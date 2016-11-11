<?php
return [
    'mobileRegex'        => '/^0?(13|15|18|14|17)[0-9]{9}$/',
    'upload_message' => [
        //工厂方法调用的类.
        'upload_class' => '\common\helper\UpYunHelper',
        //上传图片返回的地址前缀.
        'visit_url' => 'http://bigqipa.b0.upaiyun.com/',
        //空间名称.
        'upyun_bucket_name' => 'bigqipa',
        //操作人员.
        'upyun_operator_name' => 'haoyoufaner',
        //操作密码.
        'upyun_operator_pwd' => 'haoyoufaner',
    ],
];
