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
    /*网站主页*/
	'index'=>'index/index/index',

	//用户注册
	'register'=>'index/register/register',

	//用户登录
	'login'=>'index/login/login',

	//不能用
	'logining'=>'index/login/logining',

	//测试
	 'user'=>'index/user/user',

	 //
	 'changepsw'=>'index/user/changepsw',
	 'logout'=>'index/user/logout',
	 'changepassword'=>'index/user/changepassword',



	 /*作者后台*/
	 'author'=>'author_admin/index/index',
	 'work' => 'author_admin/work/index',
	 'create' => 'author_admin/work/create',
	 'createinfo' => 'author_admin/work/createinfo',
	 'docreate' => 'author_admin/work/docreate',
	 'createok' => 'author_admin/work/createok',
	 'chapter'=>'author_admin/work/chaptertmp',

//方法路由
	// 章节添加
	'addchapter' => 'author_admin/work/addchapter',
	// 查看章节（章节详情）
	'ajax_chapter' => 'author_admin/work/ajax_chapter',
	//选择章节
	'select_chapter' => 'author_admin/work/selectchapter'
];
