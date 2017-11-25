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
} 