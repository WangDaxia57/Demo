<?php
namespace app\index\model;
use think\Input;

class Admin extends \think\Model
{
    /*登录验证*/
    public static function login($name, $password)
    {
        $where['user_account'] = $name;
        $where['user_password'] = md5($password);
		/* trace( md5($password)); */
        $user=Admin::where($where)->find();
		
        if ($user) {
            unset($user["password"]);
            session("ext_user", $user);
			trace("#################8888#######################");
            return true;
        }else{
			trace("#################4444444#######################");
            return false;
        }
    }
	
	/*退出登录*/
    public static function logout(){
        session("ext_user", NULL);
        return ; 
    }
	/*查询一条数据*/
    public static function search($name){
        $where['user_account'] = $name;
        $user=Admin::where($where)->find();
        return $user;
    }

    /*更改用户密码*/
    public static function updatepassword($name,$newpassword){
        $where['user_account'] = $name;
        $user=Admin::where($where)->update(['user_password' => md5($newpassword)]);
        if ($user) {
            return true;
        }else{
            return false;
        }
    }
} 