<?php

namespace Admin\Controller;

use Think\Controller;

class PublicController extends Controller{

	// 用户登录
	public function login(){
		$this->display();
	}

	// 处理登录提交数据
	public function loginLogin(){
		$data = I('post.');

		// 删除checkcode数据否则sql语句会报错
		unset($data['checkcode']);
		
		$model = M('User');
		$res = $model->where($data)->find();

		// 处理查询数据
		if($res){ 
			//登录成功，设置session，必要信息存储到session中
			session('name',$res['name']);
			session('id',$res['id']);
			session('truename',$res['truename']);

			// 页面跳转
			$this->success('登录成功^_^',U('Index/index'));
		}else{
			$this->error('用户名或密码错误');
		}
	}


	// 退出功能
	public function logout(){
		// 清除session
		session(null);

		$this->success('您已成功退出!',U('Public/login'));
	}

	
}