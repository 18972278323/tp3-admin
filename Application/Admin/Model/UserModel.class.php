<?php

namespace Admin\Model;

use Think\Model;

class UserModel extends Model{

	// 自动验证定义   
	protected $_validate = array(
		// 验证邮箱格式是否符合
		array('email','email','邮箱格式不正确'),
		array('dept_id','-1','请选择所属部门',0,'notequal'),
	); 

}