<?php
namespace app\author_admin\model;
use think\Input;
use think\Db;
class Author extends \think\Model{
	// 根据传过来的user_id去，author表里面查询是否有user_id登录当前id的记录
	public function is_author ( $user_id ){
		$rel = Db::table('author')->where('user_id','=',$user_id)->select();
		return current($rel);
	}
} 