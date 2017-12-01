<?php
namespace app\index\controller;
use think\Controller;
use \app\index\model\Book;
use think\Session;
class Index extends Controller
{
	public function index(){
		//input('param.account')---获取重定向传入的参数
		//var_dump(input('param.account'));
		
		$book = new Book;
		$books =$book -> getBoy();		
		/* echo '<meta charset="utf-8"/>';
        echo '我们自己的网站';*/
		//$data= $books;
		/* $this->assign('data',[
            'books'  => $books
        ]); */
		session_start();
		$user=Session('ext_user');
		//var_dump($_SESSION);
		//var_dump($user);die;
		$data = array(
			'data'=>$books,
			'account'=>empty($user)?null:$user["user_account"],
			'password'=>null
		);  
		$this->assign('data',$data);
		//$this->assign('bookname',$books['book_name']);
		return $this->fetch(); 
	}
    /* public function index()
    {
		//echo '<meta charset="utf-8"/>';
        //echo '我们自己的网站';
		return $this->fetch();
    } */
}
