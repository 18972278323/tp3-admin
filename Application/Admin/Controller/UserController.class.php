<?php
namespace Admin\Controller;

use Admin\Controller\CommonController;

class UserController extends CommonController{

	// 添加用户
	public function add(){
		if(IS_POST){
			// 验证邮箱格式是否符合
			$model = D('User');
			$data = $model ->create();
			if($data === false){  // 自动验证失败
				$this->error($model->getError());
			}else{ // 自动验证通过 存储数据
				$data['addtime'] = time();
				$data['status']	 =1;
				$res = $model->add($data);

				if($res){
					$this->success('添加员工成功',U('showList'));
				}else{
					$this->error('添加失败');
				}
			}
		}else{
			$data = M('Dept')->field('id,name')->select();

			$this->assign('data',$data);
			$this->display();
		}
	}


	// 用户列表
	public function showList(){
		// 第一步:查询中记录数
		$count = M('User')->count();
		// 第二步:实例化分页类
		$page = new \Think\Page($count,10);
		// 第三步:定制分页按钮样式(可选)
		$page -> rollPage = 5;   
		//$page -> lastSuffix = false;
		$page -> setConfig('last','末页');
		$page -> setConfig('first','首页');
		// 第四步:输出分页按钮连接
		$show = $page->show();
		// 第五步:使用limit方法查询
		$sql = "select t1.* ,t2.name deptname from user t1 left join dept t2 on t1.dept_id = t2.id where t1.status = 1 limit ".$page->firstRow.",".$page->listRows;
		$data = M()->query($sql);
		//$data = M("User")->field('t1.* ,t2.name deptname')->alias('t1')->join('left join dept t2 on t1.dept_id = t2.id')->where('t1.status = 1')->limit("'".$page->firstRow.",".$page->listRows."'")->select();

		// 第六步:分配变量 跳转页面
		$this->assign('data',$data);
		$this->assign('show',$show);
		$this->assign('page',$page);
		$this->display();
	}

	// 删除用户 状态码置为0
	public function del(){
		$model = M("User");			
		$ids = explode(',',I('get.id'));
		$result = 0;
		foreach ($ids as $value) {
			// 依次修改每个用户的状态
			$model->id = $value;
			$model->status = 0;

			$res = $model -> save();
			$result += $res;
		}
		if($result){
			$this->success('删除成功',U('showList'));
		}else{
			$this->error('删除失败');
		}
	}


	// 统计各部门员工数量
	public function charts(){
		$model = M();
		//$SQL ="select count(*) count, t2.name from user t1,dept t2 where t1.dept_id = t2.id group by t1.tept_id";
		$res = $model->field('t2.name,count(*) count') -> table('user t1,dept t2')->where('t1.dept_id = t2.id')->group('t1.dept_id')->select();
		//dump($res);

		// 组装数据
		$data = '[';
		foreach ($res as $key => $value) {
			$data .= "['".$value['name']."',".$value['count']."],";
		}
		$data = rtrim($data,',')."]";

		$this->assign('data',$data);
		$this->display();
	}


}