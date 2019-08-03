<?php

namespace Admin\Controller;

use Admin\Controller\CommonController;

class DocController extends CommonController{

	// 添加公文记录
	public function add(){
		if(IS_POST){ // 处理提交数据
			$data = I('post.');

			// 调用模型层进行数据保存
			$res = D('Doc')->saveData($data,$_FILES['file']);

			if($res['status']){
				$this->success('添加成功',U('showList'));
			}else{
				$this->error('添加失败,'.$res['info']);
			}
		}else{
			$this->display();
		}
	}

	// 展示公文列表
	public function showList(){
		$data = M('Doc')->where('status = 1')->select();
		$this->assign('data',$data);
		$this->display();
	}

	// 附件下载
	public function download(){
		$res = M('Doc')->find(I('get.id'));
		$file = WORKING_PATH.$res['filepath'];
		// echo $file;die;
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		readfile($file);
	}


	// 查看公文
	public function showContent(){
		$data = M('Doc')->find(I('get.id'));
		echo htmlspecialchars_decode($data['content']);
	}

	// 编辑公文
	public function edit(){
		if(IS_POST){
			$data = I('post.');
			$result = D('Doc')->updateData($data,$_FILES['file']);
			if($result['status'] == 0){
				$this->error($result['info']);
			}else{
				$this->success('操作成功',U('showList'));
			}
		}else{
			$id = I('get.id');

			$data = M("Doc")->where('status=1')->find($id);
			$this->assign('data',$data);
			$this->display();
		}


	}
}