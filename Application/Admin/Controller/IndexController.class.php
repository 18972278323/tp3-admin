<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller{

	// 跳转到登录视图
	public function index(){
		$this->display();
	}

	public function home(){
		$this->display();
	}

}