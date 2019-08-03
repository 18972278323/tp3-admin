<?php

// 命名空间
namespace Admin\Model;

use Think\Model;


class DeptModel extends Model{
		
	// 定义字段映射
		// 表单name->数据库字段名
		// protected $_map      = array(
		// 	'name1'		=>  'name',
		// 	'pid1'		=>  'pid',
		// ); // 字段映射定义

	// 自动验证
	protected $_validate = array(
		// 验证name不能为空
		array('name','require','部门名称不能为空!'),
		array('name','','部门名称已存在',0,'unique'),

	); // 自动验证定义

	// 真是表名
    //protected $trueTableName = '';


}