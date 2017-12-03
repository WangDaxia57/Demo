<?php
/****
   @author：1132w11
   email：1113249273@qq.com 
   2016.10.25 14:02;
****/
return [
    "web_root"   => "/tp5/public/",
    "web"       => "",
    //
	$GLOBALS['_path'] = 'localhost:8080',

    'session' => [
        'auto_start' => true,
        'name' => 'login@',
        'expire' => 1800,                        /*时间长度*/
    ],


    'http_exception_template'    =>  [
        // 定义404错误的重定向页面地址
        404 =>  APP_PATH.'404.html',
    ],

    'app_debug' => true,   /*调试模式*/
	
	
];
