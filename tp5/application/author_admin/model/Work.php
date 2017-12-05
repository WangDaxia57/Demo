<?php
namespace app\author_admin\model;
use think\Input;
use think\Db;
class Work extends \think\Model{
	// 添加方法
	public function docreate( $data ){
		
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


		
		Db::table('book')
    ->data(['book_name'=>$_POST["book_name"]])
    ->insert();*/
		$rel=Db::table('book')
	    	->data([
	    		'book_name'=>$data['book_name']
	    	])
	    	->insert();	
		return $rel;
	}
} 