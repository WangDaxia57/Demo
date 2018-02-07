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
			->join('string sellstaus','sellstaus.string_id = bd.sell_status_id')
			->join('string sss','sss.string_id = bd.update_status_id')
			->join('string edit_s','edit_s.string_id = bd.editorial_type_id')
			->join('string signstr','signstr.string_id = bd.sign_id')
			->where('b.author_id = '.$author_id)
			->field(
				'ss.string_name as book_type,
				s.string_name as channerl,
				sellstaus.string_name as sell_status,
				sss.string_name as update_status,
				edit_s.string_name as editorial_type,
				signstr.string_name as sign_id,
				b.book_id,
				b.book_name,
				b.short_introduce,
				b.image_url,
				b.word_nums,
				b.chapters,
				b.collection,
				b.sells,
				b.popularity,
				b.latest_chapter_id,
				b.latest_chapter,
				b.latest_chapter_time,
				b.last_update_at,
				bd.sell_status_id
				'
			)
			->select();
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


	public function getVolume ( $book_id ){
		//var_dump($book_id);die;
		$volume=Db::table('volume'.$book_id)
			->where('volume_id','<',300)
			->order('_id desc')
			->select();
		return $volume;
	}

 	// 添加章节
	public function addchapter( $data ){
		$rel=null;
		if(!empty($data)){
			if(!empty($data['book_id'])&&!empty($data['volume_id']))
			{
				//var_dump($data['volume_id']);die;
				//$count=Db::table('chapter'.$data['book_id'])->where('volume_id','=',$data['volume_id'])->max('chapter_id');
				$count=Db::table('chapter'.$data['book_id'])->where('volume_id','=',$data['volume_id'])->select();
				$ids = array();
				foreach( $count as $key => $val){
					$ids[$key] = $val['chapter_id'];
				}
				if(empty($ids))
					$num=0;
				else
					$num = max( $ids );
				$num=$num+1;
				if($data['chapter_id']==-1)
				{
					$rel=Db::table('chapter'.$data['book_id'])
		    		->data([
			    		'chapter_name'=>$data['chapter_name'],
			    		'book_content'=>$data['book_content'],
			    		'chapter_id'=>$num,
			    		'book_id'=>$data['book_id'],
			    		'volume_id'=>$data['volume_id']
			    	])
		    		->insert();
	    		}else{
	    			//更新章节
	    			$UpdateData =[
		    			'chapter_name'=>$data['chapter_name'],
		    			'book_content'=>$data['book_content'],

	    			];
	    			$rel = db('chapter'.$data['book_id'])->where('chapter_id',$data['chapter_id'])->update($UpdateData);
	    		}
	    		if($data['volume_id']!=801){
	    			$editData =[
		    			'latest_chapter'=>$data['chapter_name'],
		    			'latest_chapter_id'=>$num,//最新章节id
		    			//'latest_chapter_time'=>date('Y-m-d H:i:s',time())
	    			];
	    			$book = db('book')->where('book_id',$data['book_id'])->update($editData);

	    		}
	    		$last_data=Db::table('chapter'.$data['book_id'])->where('volume_id','=',$data['volume_id'])->where('chapter_id','=',$num)->find();
	    		echo json_encode($last_data);die;
	   		}
		}
	}


	/**
	 * 查看章节(章节列表)
	 * @param $book_id 书的id
	 * @return $arr chapter{$book_id}表里面volume_id=801的记录
	 */
	public function showchapter( $book_id ){
		$rows=Db::table('chapter'.$book_id)
			->where('volume_id','=','801')
			->order('last_update_at desc')
			->select();
		return $rows;
	}

	// 章节详情
	/**
	 * @param $book_id 书的id，表明会用到
	 * @param $chapter_id 章节id
	 * @return $arr 章节信息
	 */
	public function chapterdetail( $book_id, $chapter_id ){
		if(!empty($book_id)){
			$row=Db::table('chapter'.$book_id)->where('chapter_id','=',$chapter_id)->find();
			return $row;
		}
	}	

	public function select_chapter($select_chapter_id,$string_id){
		$editData =[
		    		'string_name'=>$select_chapter_id,
	    			];
		$string = db('string')->where('string_id',$string_id)->update($editData);
		if(!empty($string))
			return true;
		else
			return false;
	}
	public function getselectchapter($string_id){
		$row=Db::table('string')->where('string_id','=',$string_id)->find();
		if(!empty($row))
			return $row["string_name"];
		else
			return null;
	}
} 