<?php

namespace app\author_admin\controller;
use think\Controller;
use think\Request;
use think\Db;
require_once(APP_PATH.'publicmodel.php');
use \app\publicmodel;
class Work extends AuthorBase{

	public function index(){
		//$model = new publicmodel();
		//$a = $model->getSingle('valume100001','_id,=,1');
		

		// var_dump($GLOBALS['_path']);return;
		// echo '1111111111111';return;
		//$data = array(
		//	'path'=>$GLOBALS['_path']
		 //);
		 //$this->assign('data',$data);
		//$this->fetch('../works/index')
		$rel =$this -> login_state();
		//$a = array('a','b');
		//$data = array(
		//	'a' => $a,
			//'total' => $data['total']
		//);
			//本页面刷新
			$this->assign('data',$rel);
			return $this->fetch('works/index'); 
		//return $this->fetch('works/index'); 
	}

	// 添加页面显示
	public function  create(){
		$data =$this -> checkedloginpower();
		if(!empty($data)){
			//本页面刷新
			$this->assign('data',$data);
			return $this->fetch('works/create'); 
		}
	}
	// 添加页面功能
	public function  docreate(){
		$work = new \app\author_admin\model\Work;
		$rel = $work->docreate( $_POST	);
		if (!empty($rel)) {
			echo json_encode(array('msg'=>'添加成功','code'=>0));die;
		}else{
			echo json_encode(array('msg'=>'添加失败','code'=>1));die;
		}
	}
	//创建书
	public function createok(){
		$data =$this -> checkedloginpower();
		if(!empty($data)){
			//本页面刷新
			$this->assign('data',$data);
			return $this->fetch('works/createok'); 
		}
	}
	public function  createinfo(){
		$data =$this -> checkedloginpower();
		if(!empty($data)){
			//本页面刷新
			$this->assign('data',$data);
			return $this->fetch('works/createinfo'); 
		}
	}
	//打开章节编辑界面--
	public function chaptertmp(){
		// 章节id，用来显示章节标题，和章节内容的
		//$chapter_id = !empty($_GET['chapter_id']) ? $_GET['chapter_id'] : '';
		$book_id = $_GET['book_id'];
		$work = new \app\author_admin\model\Work;
		$volumes = $work->getVolume( $book_id );
		$rel =$this -> login_state();
		// 章节列表
		$chapter_arr = $work->showchapter( $book_id );
		// 章节详情
		/*if ( !empty($chapter_id) ) {
			$detail = $work->chapterdetail($book_id, $chapter_id);

			// 章节标题
			if ( array_key_exists('chapter_name',$detail) ) {
				$chapter_name = $detail['chapter_name'];
			}else{
				$chapter_name = '';
			}

			// 章节内容
			if( array_key_exists('book_content',$detail) ){
				$book_content = $detail['book_content'];
			}else{
				$book_content = '';
			}


		}*/
		//var_dump($chapter_arr);return;
		//$b = $model->getSingle('valume'.$book_id,'valume,<,300');
		if(!empty($rel)){
			foreach ($rel['book'] as $key => $value) {
				if($value['book_id']==$book_id){
					$book_name=$value['book_name'];
					$sell_status_id=$value['sell_status_id'];
				}
			}
			$data = [
				'volumes' => $volumes,
				'book_name'=>$book_name,
				'book_id'=>$book_id,
				'sell_status_id'=>$sell_status_id,
				'last_volume'=>end($volumes),
				'chapter_arr'=>$chapter_arr
				//'chapter_name' => $chapter_name,
				//'book_content' => $book_content
			];	
			//var_dump($data);return;
			//本页面刷新''
			$this->assign('data',$data);
			return $this->fetch('works/chaptertmp'); 
		}

	}


	// 添加章节
	public function addchapter(){
		$addData['volume_id'] = !empty($_POST['volume_id']) ? $_POST['volume_id'] : 801;
		if(!empty($_POST['book_id']))
			$addData['book_id'] = $_POST['book_id'];
		if(!empty($_POST['chaptertitle']))
		$addData['chapter_name'] = $_POST['chaptertitle'];
		if(!empty($_POST['content']))
		$addData['book_content'] = $_POST['content'];
		$work = new \app\author_admin\model\Work;
		$data = $work->addchapter( $addData );
		echo json_encode($data);die;
	}

	// 
	/**
	 * 切换标题，显示内容
	 * @param $_POST['chapter_id'] 章节id
	 * @param $_POST['book_id'] 书的id
	 */
	public function ajax_chapter(){
		$chapter_id = $_POST['chapter_id'];
		$book_id = $_POST['book_id'];
		if ( !empty($chapter_id) ) {
			$work = new \app\author_admin\model\Work;
			$detail = $work->chapterdetail($book_id, $chapter_id);
			
			// 章节标题
			if ( array_key_exists('chapter_name',$detail) ) {
				$chapter_name = $detail['chapter_name'];
			}else{
				$chapter_name = '';
			}

			// 章节内容
			if( array_key_exists('book_content',$detail) ){
				$book_content = $detail['book_content'];
			}else{
				$book_content = '';
			}
		}

		$data = [
			'chapter_name' => $chapter_name,
			'book_content' => $book_content
		];
		echo json_encode($data);die;
	}
}
 ?>