<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
	public function index(){
		echo '<meta charset="utf-8"/>';
        echo '我们自己的网站';
		return $this->fetch();
	}
    /* public function index()
    {
		//echo '<meta charset="utf-8"/>';
        //echo '我们自己的网站';
		return $this->fetch();
    } */
}
