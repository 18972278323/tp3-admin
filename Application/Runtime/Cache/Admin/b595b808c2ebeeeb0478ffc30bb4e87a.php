<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp3/Public/Admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/tp3/Public/Admin/css/jquery.dialog.css" />
<link rel="stylesheet" href="/tp3/Public/Admin/css/index.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <h1 class="logo"></h1>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear"><span>欢迎您&nbsp;</span><a href="<?php echo U('Email/recBox');?>" target="iframe" class="user-name"><?php echo (session('truename')); ?></a></div>
        <div class="login-msg ue-clear"> <a href="javascript:;" class="msg-txt">消息</a> <a href="<?php echo U('Email/recBox');?>" target="iframe" class="msg-num"></a> </div>
      </div>
      <div class="toolbar ue-clear"> <a href="/tp3/index.php/Admin/Index/index" class="home-btn">首页</a> <a href="javascript:;" class="quit-btn exit"></a> </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">
          <li class="office current">
            <div class="nav-header"><a href="javascript:;" date-src="home.html" class="ue-clear"><span>邮件管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Email/send');?>">写邮件</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Email/sendBox');?>}">发件箱</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Email/recBox');?>}">收件箱</a></li>
            </ul>
          </li>
          <li class="gongwen">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>公文管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Doc/add');?>">添加公文</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Doc/showList');?>}">公文列表</a></li>
            </ul>
          </li>
          <li class="nav-info">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>员工管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('User/add');?>">添加员工</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('User/showList');?>}">员工列表</a></li>
            </ul>
          </li>
          <li class="agency">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>部门管理</span><i class="icon"></i></a></div>
              <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Dept/add');?>">新增部门</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Dept/showList');?>">部门列表</a></li>
            </ul>
          </li>
          <li class="email">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>邮件管理</span><i class="icon"></i></a></div>
          </li>
          <li class="system">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>系统管理</span><i class="icon"></i></a></div>
          </li>
        </ul>
      </div>
      <div class="content">
        <iframe name="iframe" src="/tp3/index.php/Admin/Index/home.html" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <div id="ft" class="ue-clear">
    <div class="ft-left"> <span>中国移动</span> <em>Office&nbsp;System</em> </div>
    <div class="ft-right"> <span>Automation</span> <em>V2.0&nbsp;2014</em> </div>
  </div>
</div>
<div class="exitDialog">
  <div class="dialog-content">
    <div class="ui-dialog-icon"></div>
    <div class="ui-dialog-text">
      <p class="dialog-content">你确定要退出系统？</p>
      <p class="tips">如果是请点击“确定”，否则点“取消”</p>
      <div class="buttons">
        <input type="button" class="button long2 ok" value="确定" />
        <input type="button" class="button long2 normal" value="取消" />
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/tp3/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/js/index.js"></script>
<script type="text/javascript">
  
  function getCount(){
    $.get("<?php echo U('Email/getCount');?>", function(data) {
      $('.msg-num').html(data);
    });
  }

  $(function(){
    setInterval('getCount()',10000);
  })

</script>
</html>