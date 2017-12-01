<?php 
namespace app\author_admin\controller;
use think\Controller;
use \app\author_admin\model\Book;

class Index extends Controller
{
	public function index(){
		// var_dump($GLOBALS['_path']);return;
		//echo '1111111111111';return;
		session_start();
		$user=Session('ext_user');

	
		if(empty($user)){
			//若为空，调回登录界面登录去
			return $this->redirect('index/login/login');	
		}else{
			
		}
		$data = array(
			'path'=>$GLOBALS['_path']
		);
		$this->assign('data',$data);
		return $this->fetch(); 
	}
}
 ?>