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

	// 获取当前作者的书籍
	public function getBooks( $author_id ){
		/*
			->field('xxx,xxx,xxx')
			用来指定要显示的字段，重复的字段可以在这个里面定义别名
		*/
		$rel = Db::table('book')
			->alias('b')
			->join('book_detail bd','b.book_id = bd.book_id')
			->join('string s','s.string_id = bd.channel_id')
			->join('string ss','ss.string_id = bd.book_type_id')
			->where('b.author_id = '.$author_id)
			->field(
				'ss.string_name as book_type,
				s.string_name as channerl,
				b.book_id,
				b.book_name,
				b.short_introduce,
				b.image_url,
				b.word_nums,
				b.chapters,
				b.collection,
				b.sells,
				b.popularity,
				b.last_update_at
				'
			)
			->select();
			//var_dump($rel);die();
		return $rel;/**/
	}

	// 根据书的id获取最新章节
	public function getLastChapter( $book_id ){
		//$books = Db::table('book')->where('_id','>=',1)->select();
		$chapter=Db::table('chapter'.$book_id)
			->where('_id','>',0)
			->order('_id desc')
			->limit(1);
		var_dump($chapter);die;
	}
} 