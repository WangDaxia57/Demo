<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
use Captcha;
use think\View;

class Login extends Controller
{ 
    public function login(){

      return $this->fetch();
    }
	
	public function logining()
    {
	
      $name = input('request.name');
      $password  = input('request.password');
      $data = input('request.captcha');
	
	 
	 //暂时不验证验证码
     // dump($data);
     // if(!captcha_check($data)){
       //验证失败
       //   return $this->error("验证码错误");
    //  };
    
		$check=\app\index\model\Admin::login1($name, $password);
		
		if ($check) {
			 header(strtolower("Location: http://localhost:8080"));
			/* $url = 'index';
			echo "<script>window.location.href='".$url."'</script>"; */
			/* header(strtolower("location:". config("web") . "admin")); */
			
			exit();
		}else{
			return $this->error("用户名或密码错误","Login/login");
		}
	}
}