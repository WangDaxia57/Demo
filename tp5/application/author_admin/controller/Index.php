<?php 
namespace app\author_admin\controller;
use think\Controller;
use \app\author_admin\model\Author;
use \app\author_admin\model\Public_model;

class Index extends AuthorBase{

	public function index(){
		$data =$this -> login_state();
		if(!empty($data)){
		//本页面刷新
			$this->assign('data',$data);
			return $this->fetch('Index/index'); 
		}
	}
}
 ?>