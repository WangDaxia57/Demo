<?php 
namespace app\author_admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use \app\author_admin\model\Public_model;

class AuthorBase extends Controller{
	/*
			101:账号为空
			102：无权限
			103：登陆成功
	*/
	public function login_state(){
		session_start();
		$user=Session('ext_user');
		if(empty($user)){
			//若为空，调回登录界面登录去
			 $this->redirect('index/login/login');	
			 return null;
		}

		// 下面是登录状态下，需要验证是否是作者
		$pub = new Public_model;

		$author =$pub -> checkpower( $user['user_id'] );
		//var_dump($author['_id']);die;
		// 作者
		if (!empty($author['_id'])) {
			$work = new \app\author_admin\model\Work;
			$book=$work->getBooks();
			var_dump($book);die;
			$data = array(
				'path'=>$GLOBALS['_path'],
				'total' => count($author),
				'author' => $author
			);
			//发给作者后台公用头文件开始
			$this->assign('author',$author);
			$this->fetch('works/index');
			//发给公用头文件结束
			return $data;
		}else{
		// 普通用户
			
			//var_dump('没有权限');die;
			 $this->redirect('index/index/index');
			 return null;
		}
		return null;
	}
}
 ?>