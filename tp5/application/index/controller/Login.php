<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
use Captcha;
use think\View;
use \think\Session;

class Login extends Controller{

		// $user = Session::get('ext_user');
		// var_dump($user);die;

	// 显示登录界面
    public function login(){
    	//$login_type = $_GET['login_type'];
    	//var_dump($_GET['login_type']);die;
    	//$this->assign(array('type'=>$_GET['login_type']);
		return $this->fetch();
    }
	
	// 执行登录方法
	public function logining(){
		$name = $_POST['name'];
		$password = $_POST['password'];
		//user\autho
		$login_type = $_POST['type'];
		$userdata = array(
    		'pwd' => $password,
    		'name'=>$name
    	);
		$check=\app\index\model\User::login1($name, $password);
		if ($login_type=='user' && $check) {
			$this->redirect('index/index/index');
			exit();
			 // header(strtolower("Location: http://localhost:8080"));
			/* $url = 'index';
			echo "<script>window.location.href='".$url."'</script>"; */
			/* header(strtolower("location:". config("web") . "admin")); */
		}else{
			$this->redirect('author_admin/index/index');
			//return $this->error("用户名或密码错误","Login/login");
		}
		// $name = $_POST['name'];
  //   	$name = input('request.name');
  //   	$password  = input('request.password');
  //   	$data = input('request.captcha');
	 
	 
	 //暂时不验证验证码
     // dump($data);
     // if(!captcha_check($data)){
       //验证失败
       //   return $this->error("验证码错误");
    //  };
    	
	}

	// 退出
	public function log_out(){
		$log_out=\app\index\model\User::logout();
		if ($log_out) {
			$this->redirect('index/index/index');
		}
	}
}