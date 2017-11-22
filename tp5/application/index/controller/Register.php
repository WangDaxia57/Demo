<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
use Captcha;
use think\View;

class Register extends Controller{ 
   public function register(){
		return $this->fetch();
   }
}