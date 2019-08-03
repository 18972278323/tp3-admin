<?php

namespace Admin\Controller;

use Admin\Controller\CommonController;

class EmailController extends CommonController{

	// 发邮件
	public function send(){
		if(IS_POST){
			$data = I('post.');
			$res = D('Email')->sendEmail($data,$_FILES['file']);

			if($res['status'] == 0 ){
				$this->error($res['info']);
			}else{
				$this->success('发送成功',U('sendBox'));
			}
		}else{
			$data = M('User')->where('id != '.session('id'))->select();
			$this->assign('data',$data);
			$this->display();
		}
	}

	// 收件箱
	public function recBox(){
		$id = session(id);
		//$sql = "select t1.*,t2.truename from email t1,user t2 where t1.from_id = t2.id and t1.to_id = $id";
		$data = M()->field('t1.*,t2.truename')->table('email t1, user t2')->where('t1.from_id = t2.id and t1.to_id = '.$id)->select();
		// dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}

	// 发件箱
	public function sendBox(){
		$id = session('id');
		$data = M()->field('t1.*,t2.truename truename')->table('email t1 , user t2')->where('t1.to_id = t2.id and t1.from_id = '.$id)->order('addtime desc')->select();
		// dump($res);die;
		$this->assign('data',$data);
		$this->display();
	}

	// 附件的下载
	public function download(){
		$id = I('get.id');
		$res = M('Email')->field('file')->where('id= '.$id)->find();
		$file = WORKING_PATH.$res['file'];
		// dump($file);die;
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		readfile($file);
	}

	// 查看邮件内容
	public function getContent(){
		$id = I('get.id');
		$user_id = session('id');
		$res = M('Email')->where('id = '.$id.' and to_id = '.$user_id)->find();

		// 修改邮件的阅读状态
		if($res['isread'] == 0){
			$res = M('Email')->save(['id'=>$id , 'isread'=>1]);
		}

		echo $res['content'];
	}


	// 查询所有未读消息
	public function getCount(){
		$res = M('Email')->where('isread = 0 and to_id = '.session('id'))->count();
		echo $res;
	}

}