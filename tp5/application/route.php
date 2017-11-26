<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
	'index'=>'index/index/index',
	'register'=>'index/register/register',
	'login'=>'index/login/login',
	'logining'=>'index/login/logining',
	 'user'=>'index/user/user',
	 'changepsw'=>'index/user/changepsw',
	 'logout'=>'index/user/logout',
	 'changepassword'=>'index/user/changepassword',
	 /*作者后台*/
	 'author'=>'author_admin/index/index',

];
