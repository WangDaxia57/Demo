<?php
namespace app\author_admin\model;
use think\Input;
use think\Db;
use \app\author_admin\model\Author;
class Public_model extends \think\Model{
	// 添加方法
	public function checkpower( $user_id=null ){
		// 下面是登录状态下，需要验证是否是作者
		$author = new Author;
		$a_data =$author -> is_author( $user_id );
		return $a_data;
	}

	
} 