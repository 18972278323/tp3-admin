<?php
namespace Admin\Model;

use Think\Model;

class DocModel extends Model{

	// 添加公文信息
	public function saveData($data,$file){

		// 定义返回控制层的结果数组
		$res = array(
					'status' => 1,    // 1表示成功   0表示失败
					'info'   => ''	  // 默认为空，如果出错，设置错误信息
				);

		//判断是否有文件上传
		if(!$file['error']){ //错误信息为0 表明有文件上传

			//1、定义配置类
			$cfg = array(
				'rootPath' => WORKING_PATH.UPLOAD_ROOT_PATH,
			);
			// 2、实例化文件上传类,传递配置数组
			$upload = new \Think\Upload($cfg);
			// 3、执行文件上传
			$info = $upload->uploadOne($file);  // 如果上传成功，info是文件信息，如果失败，则是false
			//$error= $upload -> getError();
			//dump($error);

			if($info){  // 上传成功

				// 添加数据表中附件相关的三个字段
				$data['hasfile'] = 1;
				$data['filename'] = $info['name']; // 原文件名
				$data['filepath'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
				// 设置添加时间和状态
				$data['addtime'] = time();
				$data['status'] = 1;

				$this->add($data);
				return $res;
			}else{ // 上传失败,返回错误信息
				$res['status'] = 0;
				$res['info']   = $upload->getError();
				return $res;
			}
		}else{ // 没有文件上传
			$data['addtime'] = time();
			$data['status'] = 1;

			$this->add($data);
			return $res;
		}
	}


	// 保存公文修改
	public function updateData($data,$file){
		// 返回结果集
		$res = array(
					'status' => 1,  // 1表示成功  0表示出错
					'info'   => ''
				);


		// 判断是否有文件上传
		if($file['error'] == '0'){// 有文件上传
			$cfg = array('rootPath' => WORKING_PATH.UPLOAD_ROOT_PATH);
			$upload = new \Think\Upload($cfg);

			$result = $upload->uploadOne($file);
			if($result){ //上传成功
				$data['filename'] = $result['name'];
				$data['filepath'] = UPLOAD_ROOT_PATH.$result['savepath'].$result['savename'];
			}else{//上传失败
				$res['status'] = 0;
				$res['info']   = $upload->getError();
				return $res;
			}
		}

		// 执行数据保存
		$res_save = $this->save($data);
		// dump($res_save);die;
		if($res_save === false){
			$res['status'] = 0;
			$res['info']   = '未知错误';
			return $res;
		}else{
			return $res;
		}
		
	}
}