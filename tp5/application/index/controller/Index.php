<?php
namespace app\index\controller;
use think\Controller;
use \app\index\model\Book;

class Index extends Controller
{
	public function index(){
		$book = new Book;
		$books =$book -> getBoy();
		/* echo '<meta charset="utf-8"/>';
        echo '我们自己的网站';*/
		//$data= $books;
		/* $this->assign('data',[
            'books'  => $books
        ]); */
		$data = array(
			'data'=>$books,
			'account'=>null,
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
