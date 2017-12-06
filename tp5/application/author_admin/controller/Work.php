<?php 
namespace app\author_admin\controller;
use think\Controller;
use think\Request;
use think\Db;
class Work extends AuthorBase{

	public function index(){
		//echo '1111111';return;
		// var_dump($GLOBALS['_path']);return;
		// echo '1111111111111';return;
		//$data = array(
		//	'path'=>$GLOBALS['_path']
		 //);
		 //$this->assign('data',$data);
		//$this->fetch('../works/index')
		$rel =$this -> login_state();
		//$a = array('a','b');
		//$data = array(
		//	'a' => $a,
			//'total' => $data['total']
		//);
			//本页面刷新
			$this->assign('data',$rel);
			return $this->fetch('works/index'); 
		//return $this->fetch('works/index'); 
	}

	// 添加页面显示
	public function  create(){

		return $this->fetch('works/create'); 
	}

	// 添加页面功能
	public function  docreate(){
		$work = new \app\author_admin\model\Work;
		$rel = $work->docreate( $_POST	);
		if (!empty($rel)) {
			echo json_encode(array('msg'=>'添加成功','code'=>0));die;
		}else{
			echo json_encode(array('msg'=>'添加失败','code'=>1));die;
		}
	}

	public function createok(){
		return $this->fetch('works/createok'); 
	}
	public function  createinfo(){
		return $this->fetch('works/createinfo'); 
	}


}
 ?>