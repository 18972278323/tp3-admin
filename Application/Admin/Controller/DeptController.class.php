<?php

// 生命命名空间
namespace Admin\Controller;

use Admin\Controller\CommonController;
use Admin\Model\DeptModel;

class DeptController extends CommonController{

	// 试试如果子类也定义了构造方法会不会调用父类的构造方法  答案是不会,此时父类的权限控制即会失效
	// public function _initialize(){
	// 	echo 'hello son';
	// }


	// 添加部门
	public function add(){

		if(IS_POST){  // 如果是POST提交,说明是要保存数据
			// $data = I('post.');
			
			// $model = M('Dept');
			// $res = $model->add($data);

			// 使用create方法创建数据模型
			$model = D('Dept');

			// 创建过程会进行自动验证,如果验证失败返回false
			$data = $model -> create();  // 如果不传递参数,默认使用$data属性接收post提交数据并返回
			if(!$data){ // 验证失败
				$this->error($model->getError());
			}else{
				$res = $model -> add($data);	

				if($res){
					$this->success('添加成功',U('showList'),3);
				}else{
					$this->error('添加失败');
				}
			}
		}else{
			// 查询部门数据
			$model = M('Dept');
			$depts = $model->select();

			$this->assign('data',$depts);
			$this->display();
		}
	}

	// 编辑部门
	public function edit(){
		if(IS_POST){
			$res = M('Dept')->save(I('post.'));
			if($res === false){
				$this->error('修改失败');
			}else{
				$this->success('修改成功',U('showList'));
			}
		}else{
			$id = I('get.id');
			$model = M('Dept');
			// 查询当前部门数据,  查询所有部门信息
			$data = $model -> find($id);
			$info = $model -> field('id,name') -> where('id !='.$id)->select();

			$this->assign('data',$data);
			$this->assign('info',$info);
			//dump($info);

			$this->display();
		}
	}

	//部门列表
	public function showList(){
		$model = M();
		//select t1.* ,t2.name from dept t2,user t1 where t1.dept_id = t2.id;
		//select t1.* , t2.name from dept t1 , dept t2 where t1.pid = t2.id;
		$sql = "select t1.* ,t2.name upname from dept t1 left join dept t2 on t1.pid = t2.id";
		$data = $model -> query($sql);
		//dump($data);
		$this->assign('data',$data);
		
		$this->display();
	}


	// 删除部门
	public function del(){
		$id = I('get.id');

		$res = M('Dept')->delete($id);
		if($res){
			$this->success('删除成功',U('showList'),3);
		}else{
			$this->error('删除失败');
		}
	}







	// 添加用户
	public function testAddUser(){
		// 1 普通方法实例化模型对象 方法1,但是不推荐使用
		//$dept = new DeptModel();   //默认会寻找与控制器同名数据库进行绑定
		//dump($dept);

		// 2 快速方法实例化模型对象 M()方法直接实例化父类的模型  D()方法优先实例化自定义的模型
		//$dept = M('Dept');   // 如果传递参数糊直接绑定对应数据表
		//$dept = M();		   // 如果没有传递数据表,不会绑定数据表,通常用来执行原生的sql语句

		//$dept = D('Dept');   // 优先实例化自定义的子类模型,如果参数传递错误会实例化父类模型
		//$dept = D();		   // 优化父类模型,与M()类似
		
		// 添加使用add方法,参数为一维关联数组,键与数据库字段一一对应,返回值为新增记录主键
		$model = M('Dept');
		$data= array(
				'name'  => '公关部',
				'pid'   => 1,
				'sort'  => 5,
				'remark'=> '公共关系维护'
				);
		$result = $model->add($data);  
		dump($result);
	}

	// 更新用户
	public function testUpdateUser(){
		$model = M('Dept');
		$data = array(
				'id'   => 8,
				'pid'  => 5,
				'remark'=>'招人裁人'
				);
		// 使用save方法,参数为一维数组,必须包含主键,如果没有主键返回false,表示语句未执行,执行成功后返回影响的行数
		$result = $model->save($data);
		dump($result);
	}

	// 查询用户
	public function testSelectUser(){
		$model = M('Dept');
		// 查询可以使用两种方法实现    7 8 9 17 
		// select()   select(id)  select('id1,id2,id3') 依次查询全部 查询指定id 查询多个id 返回值均为二维数组
		// find()     find(id)   依次为查询第一条记录,查询指定id记录
		$result = $model->select();
		$result = $model->select(8);
		$result = $model->select('7,8,9');

		$result = $model->find();
		$result = $model->find(17);
		dump($result);	
	}


	//删除用户
	public function testDeleteUser(){
		$model = M('Dept');
		// delete方法的两种用法 delete(id)  delete('id1,id2,id3') 返回删除记录数
		//$result = $model->delete(18);
		$result = $model->delete('19,20');
		dump($result);
	}

	// 测试原生sql
	public function testSql(){
		$model = M();
		//$result = $model->query('select * from dept');
		$result = $model->execute("update dept set remark = '天大地大我最大' where id = 9");
		// 获取最后一条成功执行的sql语句
		$sql = $model->getLastSql();
		dump($result);
		dump($sql);
	}

	// 测试性能调试
	public function testG(){
		G('start');
		for($i = 0; $i <= 100000; $i++){
			echo $i;
		}
		G('stop');
		echo '<br>';
		echo G('start','stop',4);
	}

	//使用AR模式添加数据,返回新增记录的主键Id
	public function testARAdd(){
		$model = M('Dept');

		$model->name = '研发部';
		$model->pid  = 10;
		$model->sort =14;
		$model->remark='研发产品';

		$res = $model->add();
		dump($res);
	}

	// 使用AR模式进行修改数据,返回修改的记录条数
	public function testARUpdate(){
		$model = M('Dept');

		$model ->id = 21;
		$model ->remark = '研究产品';
		$res = $model->save();
		dump($res);
	}

	// 使用AR模式删除数据,返回修改的记录数
	public function testARDelete(){
		$model = M('Dept');

		$model ->id = '21';

		$res = $model->delete();
		dump($res);
	}

	// 使用AR模式下的 where条件查询
	public function testARSelect1(){
		$model = M('Dept');

		$res = $model -> where('id = 8') -> select();
		dump($res);
	}

	// 使用AR模型下的 field条件查询
	public function testARSelect2(){
		$model = M('Dept');

		$res = $model -> field('id,name')->where('id>8')->select();
		dump($res);
	}

	// 使用AR模式下的 limit字段
	public function testARSelect3(){
		$model = M('Dept');

		$res = $model-> field('id,name') ->where('id>7')->limit(2)->select();
		dump($res);
	}

	// 使用AR模式下的 order字段
	public function testARSelect4(){
		$model = M('Dept');

		$res =$model->field('id,name')->where('id>7')->order('id asc')->select();
		dump($res);
	}

	// 使用AR模式下的 group字段
	public function testARSelect5(){
		$model = M('Dept');

		$res = $model->field('id,name')->where('id>7')->group('name')->select();
		dump($res);
	}

	// 使用AR模式下的统计函数
	public function testARSelect6(){
		$model =M('Dept');

		// 该返回结果也是正确的值,但是二维数组
		//$res = $model->field('count(*)')->select();

		// 返回字符串类型的数字
		$res = $model->count();
		dump($res); 
	}

	// 获取拼接的sql语句
	public function testGetSql(){
		$model = M('Dept');

		// 获取拼接语句生成的sql语句,但是不会执行该语句
		$res = $model->field('id,name')->where('id>7')->group('name')->fetchSql()->select();
		dump($res);
	}


}