<?php 
namespace app\author_admin\controller;
use think\Controller;
use \app\author_admin\model\Author;

class Index extends Controller
{
	public function index(){
		session_start();
		$user=Session('ext_user');
		if(empty($user)){
			//若为空，调回登录界面登录去
			return $this->redirect('index/login/login');	
		}

		// 下面是登录状态下，需要验证是否是作者
		$author = new Author;

		$author =$author -> is_author( $user['user_id']);
		// 作者
		if (!empty($author['_id'])) {
			
		$data2= array(
			'author_name'=>"aas"
		);
		
			$data = array(
				'path'=>$GLOBALS['_path'],
				'author' => $author
			);
			//发给公用头文件开始
			$this->assign('data2',$data2);
			$this->fetch('works/index');
			//发给公用头文件结束


			//本页面刷新
			$this->assign('data',$data);
			return $this->fetch(); 
		}else{
		// 普通用户
			
			//var_dump('没有权限');die;
			return $this->redirect('index/index/index');
		}
	}
}
 ?>