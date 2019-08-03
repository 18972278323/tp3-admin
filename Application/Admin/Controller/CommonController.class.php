<?php

namespace Admin\Controller;
use Think\Controller;

// 定义公共控制器进行权限控制
class CommonController extends Controller{

	// 构造方法有两种 PHP原生的Construct方法  和框架的_initialize方法
	// public function __construct(){
	// 	// 需要调用父类构造方法
	// 	parent::__construct(); 
	// 	echo 'hello world';die;
	// }

	public function _initialize(){
		// echo 'hello parent';die;
		$res = empty(session('id'));
		if($res){
			//$this->error('请先登录哦~',U('Public/login'));   //直接跳转可能会形成页面跳转
			$url = U('Public/login');
			echo "<script>top.location.href='$url';</script>";
		}
	}
}