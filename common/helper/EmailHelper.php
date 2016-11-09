<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/13
 * Time: 11:59
 */
namespace common\helper;

class EmailHelper {

    /**
     * @param  $to 目标邮箱.
     * @param  $placeholder_arr 数组 例子 ['template_name'=>'wjy'].
     * @return string.
     * @auth   houzhongjian.
     */
    public static function send($to, $placeholder_arr)
    {
        $arr = [
            "to" => [$to],
            "sub" => [],
        ];

        $template = $placeholder_arr['template_name'];
        unset($placeholder_arr['template_name']);
        $par = [];
        foreach($placeholder_arr as $k => $v){
            $par['%'.$k.'%'] = [$v];
        }

        $arr['sub'] = array_merge($arr['sub'], $par);
        $vars = json_encode($arr);
        return self::sendMailCore($vars, $template);
    }
    /**
     * @param $template 模板名称.
     * @param $toMail 接收人.
     * @param $name 用户名.
     * @param $url 跳转地址.
     * 调用该方法 发送邮件.
     */
    public static function sendMail($template, $toMail,$title, $name, $code)
    {
        return self::sendCloudMail($template, $toMail,$title, $name, $code);
    }

    /**
     * @param $template 模板名称.
     * @param $toMail 接收人.
     * @param $name 用户名.
     * @param $url 跳转地址.
     * @return string
     */
    private static function sendCloudMail($template, $toMail,$title, $name, $code)
    {
        $url = 'http://sendcloud.sohu.com/webapi/mail.send_template.json';
        $vars = json_encode(
            [
                "to" => [$toMail],
                "sub" => [
                    "%title%" => [$title],
                    "%name%" => [$name],
                    "%code%" => [$code],
                ],

            ]
        );

        //todo 千万别修改.
        $API_USER = 'qiparichang';
        $API_KEY = 'lSjRK5UF8j8MBPZ3';

        $param = [
            'api_user' => $API_USER, # 使用api_user和api_key进行验证
            'api_key' => $API_KEY,
            'from' => 'home@haoyoufaner.com', # 发信人，用正确邮件地址替代
            'fromname' => '奇葩日常',
            'substitution_vars' => $vars,
            'template_invoke_name' => $template,
            'subject' => '',
            'resp_email_id' => 'true'
        ];



        $data = http_build_query($param);

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $data
            ]];
        $context  = stream_context_create($options);
        $result = file_get_contents($url, FILE_TEXT, $context);

        return $result;
    }

    /**
     * 发送邮件核心部分.
     * @param $vars
     * @param $template
     * @return string.
     * @auth houzhongjian.
     */
//    private static function sendMailCore($vars, $template)
//    {
//        $url = 'http://sendcloud.sohu.com/webapi/mail.send_template.json';
//
//        //todo 千万别修改.
//        $API_USER = 'qiparichang';
//        $API_KEY = 'lSjRK5UF8j8MBPZ3';
//
//        $param = [
//            'api_user' => $API_USER, # 使用api_user和api_key进行验证
//            'api_key' => $API_KEY,
//            'from' => 'home@qiparichang.com', # 发信人，用正确邮件地址替代
//            'fromname' => '奇葩日常',
//            'substitution_vars' => $vars,
//            'template_invoke_name' => $template,
//            'subject' => '',
//            'resp_email_id' => 'true'
//        ];
//
//        $data = http_build_query($param);
//
//        $options = [
//            'http' => [
//                'method' => 'POST',
//                'header' => 'Content-Type: application/x-www-form-urlencoded',
//                'content' => $data
//            ]];
//        $context  = stream_context_create($options);
//        $result = file_get_contents($url, FILE_TEXT, $context);
//
//        return $result;
//    }
}