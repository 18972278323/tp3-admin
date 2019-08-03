<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Controller\Person;

class TestController extends Controller
{
	// 测试分组
    public function test1(){
       echo 'hello test1';
    }

    // 组装URL,使用U方法实现
    public function test2(){
    	//使用U方法,跳转到当前控制器下的test1方法上,不传递参数
    	echo U('test1').'<br>';
    	//使用U方法,跳转到User控制器下的addUser方法上
    	echo U('User/addUser').'<br>';
    	// 传递一个参数
    	echo U('test1',array('id'=>1)).'<br>';
    	// 传递多个参数
    	echo U('test1',array('id'=>10,'name'=>'zhangsan'));
    }

    // 系统跳转
    public function test3(){
    	// 使用success方法进行页面跳转
    	$this->success('操作成功',U('test1'),3);
    	// 使用error方法进行页面跳转
    	$this->error('操作失败',U('test1'),3);
    }

    // 跳转到视图
    public function test4(){
    	// 跳转到指定的页面,使用display()方法
    	// 1 跳转到与方法名相同的页面上
    	//$this->display();

    	// 2 跳转到不同方法名页面上
    	//$this->display('test');

    	// 3 跳转到其他控制器对应的页面上
    	$this->display('User/login');
    }

    // 简单变量的分配 使用assign()方法
    public function test5(){
    	$now_time = date('Y-m-d H:m:s',time());

    	// 执行变量分配
    	$this->assign('now_time',$now_time);
    	$this->display();

    }

    // 测试常用的模板常量
    public function test6(){
    	$this->display();
    }

    // 变量分配高级部分 一维数组 二维数组 以及volist foreach标签
    public function test7(){
    	//定义要分配的一维数组
	    $arr1 = array("西游记","红楼梦","水浒传","三国演义");
	    
	    //定义要分配的二维数组
	    $arr2 = array(
	        array("孙悟空","唐僧"),
	        array("贾宝玉","林黛玉"),
	        array("误用","李逵"),
	        array("孙权","诸葛亮")
	    );

	    $this->assign('arr1',$arr1);
	    $this->assign('arr2',$arr2);

	    $this->display();
    }

    // 变量分配 之 对象的分配
    public function test8(){
    	$per = new Person;
    	$per -> name = '张三';
    	$per -> age = 20;

    	$this->assign('per',$per);
    	$this->display();
    }

    // 系统变量测试
    public function test9(){
    	//$
    }

    // Session方法测试
    public function test10(){
        // 创建session
        session('name','张三');
        session('age','20');

        // 获取session
        $name = session('name');
        dump($name);echo '<br>';
        $age = session('age');
        dump($age);echo '<br>';

        // 删除session
        session('name',null);
        dump(session('name'));

        //删除所有session
        //session(null);

        // 获取所有session
        dump(session());

        // 判断session是否存在
        dump(session('?age'));

    }

    // 测试自动加载文件  自动加载应用目录下的function.php文件
    public function test11(){
        sayHello('zhangsan');
    }

    // 测试配置自动加载文件 在应用级别配置文件中 EXT_LOAD_FILE
    public function test12(){
        sayHello1('lisi');
    }

    // 测试分组级别下的function.php文件
    public function test13(){
        sayHello2('wangwu');
    }

    // 测试使用laod方法加载自定义文件
    public function test14(){
        load('@/hello');  // 使用load加载分组级别下的文件，不加后缀名
        sayHello3('zhaoliu');
    }

    // 测试cookie方法
    public function test15(){
        // 创建session
        session('name','张三');
        session('age','20');

        cookie('name','zhangsan');
        cookie('age',20);
        $coo = cookie();
        print_r($coo);

        cookie(null);

    }

    public function test16(){
        $res = M('User')->select();
        dump($res);
    }


}