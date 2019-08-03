<?php
return array(
	//'配置项'=>'配置值'

	// 自定义模板常量替换项
	'TMPL_PARSE_STRING'   => array(
						'__ADMIN__'	=> __ROOT__ . '/Public/Admin'
							),

	// 定义数据库配置项
	'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'db_oa', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => 'root', // 密码
    'DB_PORT'                => '3307', // 端口
    'DB_PREFIX'              => '', // 数据库表前缀

    // 开启页面跟踪
    'SHOW_PAGE_TRACE'		 => true,

    // 配置应用基本的自动加载文件   自动记载应用级别Common目录下的hello.php文件
    //'LOAD_EXT_FILE'          =>  'hello',
);