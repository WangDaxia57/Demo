<?php
// 改变应用目录的名称
define('APP_PATH', __DIR__.'/tp5/application/');
//define('APP_PATH', __DIR__.'/myapps/');
//开启调试模式
define('APP_DEBUG',true);

//路径分隔符，linux下是’\‘，win下是'/'或'\'
define('DS',DIRECTORY_SEPARATOR);
// 加载框架引导文件
require  './tp5/thinkphp/start.php';
?>