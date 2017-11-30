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

    public function login(){
    	//$this->assign(array('type'=>$_GET['login_type']);
		return $this->fetch();
    }
	
	public function logining(){
		$name = $_POST['name'];
		$password = $_POST['password'];
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
    	$userdata = array(
    		'pwd' => $password,
    		'name'=>$name
    	);
		$check=\app\index\model\User::login1($name, $password);
		if ($check) {
			$this->redirect('index/index/index');			
			 // header(strtolower("Location: http://localhost:8080"));
			/* $url = 'index';
			echo "<script>window.location.href='".$url."'</script>"; */
			/* header(strtolower("location:". config("web") . "admin")); */
			
			exit();
		}else{
			return $this->error("用户名或密码错误","Login/login");
		}
	}
}