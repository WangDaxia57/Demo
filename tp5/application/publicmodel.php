<?php
namespace app;
use think\Input;
use think\Db;
class Publicmodel extends \think\Model{
	// 根据传过来的user_id去，author表里面查询是否有user_id登录当前id的记录
	// 查询一条
	public function getSingle($table=null,$where=null){
		if ($where) {
			$param  = explode(',',$where);
			$key = $param[0];
			$type = $param[1];
			$val = $param[2];
		}
		$row = Db::table($table)
			->where($key,$type,$val)->find();
		return $row;
	}
	// 查询多条
	public function getData($table=null,$where=null){
		if ($where) {
			$param  = explode(',',$where);
			$key = $param[0];
			$type = $param[1];
			$val = $param[2];
		}
		$row = Db::table($table)
			->where($key,$type,$val)->select();
		return $row;
	}

}