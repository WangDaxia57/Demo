<?php
namespace app\index\model;
use think\Input;
use think\Db;
class Book extends \think\Model{
	
	/* 第一个方法用来查询主页上的重磅男生（2条） */
	public static function getBoy(){
		//var_dump("0000");
		/* $books = Book::where('_id','>',0)->select();  */
		$books = array();
		//$books = Book::where('_id','>',0)->select(); 
		$books = Db::table('book')->where('_id','>=',1)->select();
		//$result = Db::query('select * from book');
		
       // return $result;
		return $books;
		/* return */
	}

	// 修改最新章节信息
	public function editchapter( $data ){
		//var_dump($data);die;

		$data = Db::table('book')->where('book_id','=',$data['book_id'])->select();
		$row = current($data);
		$editData = [
			'latest_chapter'=>$data['chapter_name'],
			'latest_chapter_id'=>1,//最新章节id
			'latest_chapter_time'=>data('Y-m-d H:i:s',time())
	    ];
	   // var_dump($this);die;

	    $rel=$this->where('_id', $row['_id'])->update(['latest_chapter_id'=>1]);

		//$rel = $this->where('_id', $row['_id'])->update($editData);

		return $rel;
		/*
			$book = new \app\index\model\Book;
	    		$b_data = Db::table('book')
					->where('book_id','=',$_data['book_id'])
					->limit(1);
				var_dump($b_data);die;
	    		//$user = new User;
	    		$editData = [
	    			'latest_chapter'=>$data['chapter_name'],
	    			'latest_chapter_id'=>1,//最新章节id
	    			'latest_chapter_time'=>data('Y-m-d H:i:s',time())
	    		];
				$book_data = $book->where('book_id', $data['book_id'])
				    ->update($editData);

		*/
	}
} 