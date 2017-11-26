<?php 
namespace app\author_admin\controller;
use think\Controller;
use \app\author_admin\model\Book;

class Index extends Controller
{
	public function index(){
		// var_dump($GLOBALS['_path']);return;
		// echo '1111111111111';return;
		 $data = array(
			'path'=>$GLOBALS['_path']
		 );
		 $this->assign('data',$data);
		return $this->fetch(); 
	}
}
 ?>