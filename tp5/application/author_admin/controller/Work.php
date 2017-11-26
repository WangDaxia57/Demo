<?php 
namespace app\author_admin\controller;
use think\Controller;
use think\Request;
use \app\index\model\Book;

class Work extends Controller{

	public function index(){
		//echo '1111111';return;
		// var_dump($GLOBALS['_path']);return;
		// echo '1111111111111';return;
		//$data = array(
		//	'path'=>$GLOBALS['_path']
		 //);
		 //$this->assign('data',$data);
		return $this->fetch('works/index'); 
	}

	// 添加页面显示
	public function  create(){
		return $this->fetch('works/create'); 
	}
	// 添加页面功能
	public function  docreate(){
		//$book = new Book;

		/*
			var type_id = "<?=$_GET['type_id']?>";
    	// 作品名称
    	var bookName = $("#bookName").val();
    	// 作品标签
    	var taglistId = $("#taglistId").val();
    	// 授权类型
    	var radioclass = $(".radioclass:checked").val();
    	// 作品介绍
    	var intro = $("#intro").val();
    	//  扉页寄语
    	var pagemessage = $("#pagemessage").val();


		*/
		Db::table('book')
    ->data(['book_name'=>$_POST["book_name"]])
    ->insert();

		//$book = new Book( $_POST );
		//$rel = $book->allowField(['book_name'])->save();
		var_dump($rel);die;
		echo json_encode($rel);die;
		
	}
	public function  createinfo(){
		return $this->fetch('works/createinfo'); 
	}
}
 ?>