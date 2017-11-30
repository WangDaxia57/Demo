<?php
namespace app\index\model;
use think\Input;
use think\Db;
use think\Session;

class User extends \think\Model
{
    /*登录验证*/
    public static function login($name, $password)
    {
		var_dump(name);die;
        $where['user_account'] = $name;
		var_dump($where);die;
        $where['user_password'] = md5($password);
		/* trace( md5($password)); */
        $user=User::where($where)->find();
		var_dump($user);die;		
        if ($user) {
            unset($user["password"]);
            session($name, $user);
			trace("#################8888#######################");
            return true;
        }else{
			trace("#################4444444#######################");
            return false;
        }
    }
	/*登录验证*/
    public static function login1($name, $password)
    {
		
		
        $where['user_account'] = $name;
        $where['user_password'] = md5($password);
		/* trace( md5($password)); */
        $user=Db::table('user')->where($where)->find();
				
        if ($user) {
            unset($user["password"]);
            //Session::clear();
			session_start();
			session('ext_user', $user);
			
            return true;
        }else{
			
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