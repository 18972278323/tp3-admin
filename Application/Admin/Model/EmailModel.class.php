<?php

namespace Admin\Model;

use Think\Model;

class EmailModel extends Model{

	public function sendEmail($data,$file){
		$res = array(
					'status' => 1,
					'info'   => ''
				);

		if($file['error'] == 0 ){
			$cfg = ['rootPath' => WORKING_PATH.UPLOAD_ROOT_PATH];

			$upload = new \Think\Upload($cfg);
			$info = $upload->uploadOne($file);

			if($info){
				$data['filename'] = $info['name'];
				$data['file'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
				$data['hasfile'] = 1;
			}else{
				$res['status'] = 1;
				$res['info'] = '未知错误';
				return $res;
			}
		}

		$data['addtime'] = time();
		$data['from_id'] = session('id');
		$data['isread']  = 0;
		// dump($data);die;
		$res_add = $this->add($data);
		if($res_add){
			return $res;
		}else{
			$res['status'] = 1;
			$res['info'] = '未知错误';
			return $res;
		}

	}
}