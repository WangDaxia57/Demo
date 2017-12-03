<?php
namespace app\index\controller;
use think\Controller;



class User extends Controller
{
	/*退出登录*/
    public function logout(){
	   	session_start();
    	$logout=\app\index\model\User::logout();

    	//var_dump($logout);die;
    	//var_dump('1111111');die;
//        \app\index\model\User::logout();
    //var_dump($_SESSION);die;
      if (!session('ext_user')) {
      	var_dump('12123');
      	//var_dump('123123');die;
        //header(strtolower("location:". config("web") . "login"));
        //exit();
        header(strtolower("location:". config("web") . "index"));
        exit();
        //return $this->redirect('index/index/index');
      }
      return NULL;
    }





	//==============================================
	public function index(){
		return $this->fetch(); 
	}
	
	public function test(){
		return $this->fetch(); 
	}
	
    /*后台页面*/
	public function user(){
		return $this->fetch(); 
	}


   	/*修改密码页面*/
    public function changepsw()
    {
       if (!session('?ext_user')) {
        header(strtolower("location: /login"));
        exit();
       }
       return $this->fetch(); 
    }
	
	/*修改密码*/
    public function changepassword(){
      $oldpassword = md5(input('request.oldpassword'));
      $newpassword  = input('request.newpassword');
      $newpassword1  = input('request.newpassword1');
      $name=session('ext_user')['user_account'];
      $changepsw=\app\index\model\Admin::search($name);
      // dump($changepsw['admin_password']);
      $password=$changepsw['admin_password'];
      if ($password==$oldpassword ) {
        if ($newpassword==$newpassword1) {
          $updatepassword=\app\index\model\Admin::updatepassword($name,$newpassword);
          if ($updatepassword) {
            session("ext_user", NULL);
            return $this->success('修改成功，请重新登录', ''.config("web_root").'/index/login/login');
          }else{
            return $this->error("修改密码失败");
          }
        }else{
          return $this->error("两次输入密码不一致");
        }
      }else{
        return $this->error("原密码输入错误");
      }
      
    }
} 
