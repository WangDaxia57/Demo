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

	public function login_state(){
		session_start();
		$user=Session('ext_user');
		if(empty($user)){
			//若为空，调回登录界面登录去
			 $this->redirect('index/login/login');	
			 return false;
		}

		// 下面是登录状态下，需要验证是否是作者
		$pub = new Public_model;

		$author =$pub -> checkpower( $user['user_id'] );

		// 作者
		if (!empty($author['_id'])) {
			
			$data = array(
				'path'=>$GLOBALS['_path'],
				'author' => $author
			);
			//发给作者后台公用头文件开始
			$this->assign('author',$author);
			$this->fetch('works/index');
			//发给公用头文件结束
			return true;
		}else{
		// 普通用户
			
			//var_dump('没有权限');die;
			 $this->redirect('index/index/index');
			 return false;
		}
		return false;
	}
} 