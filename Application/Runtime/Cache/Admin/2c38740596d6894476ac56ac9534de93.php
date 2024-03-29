<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp3/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp3/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/tp3/Public/Admin/css/WdatePicker.css" />

<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .id{ width:63px; text-align: center;}
	table tr .name{ width:118px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:17px;}
	table tr .dept_id{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:80px; padding-left:13px;}
	table tr .tel{ width:113px; padding-left:13px;}
	table tr .email{ width:160px; padding-left:13px;}
	table tr .addtime{ width:160px; padding-left:13px;}
	table tr .operate{ padding-left:13px;}
</style>
</head>

<body>
<div class="title"><h2>公文管理</h2></div>
<div class="table-operate ue-clear">
	<a href="/tp3/index.php/Admin/Doc/add" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="id">序号</th>
                <th class="name">作者</th>
                <th class="content">标题</th>
				<th class="file">附件</th>
				<th class="addtime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($data)): foreach($data as $key=>$fore): ?><tr>
            	<td class="id"><?php echo ($fore["id"]); ?></td>
                <td class="name"><?php echo ($fore["author"]); ?></td>
                <td class="content"><?php echo ($fore["title"]); ?></td>
				<td class="file">
                    <span style="float: left">
                    <?php if(!empty($fore["hasfile"])): ?>【<a href="/tp3/index.php/Admin/Doc/download/id/<?php echo ($fore["id"]); ?>">下载</a>】<?php endif; ?>
                    </span>
                    <?php echo ($fore["filename"]); ?>
                </td>
                <td class="addtime"><?php echo (date('Y-m-d H:i:s',$fore["addtime"])); ?></td>
                <td class="operate">
                	<a href ='javascript:;' class="show" data="<?php echo ($fore["id"]); ?>" data-title="<?php echo ($fore["title"]); ?>">查看</a> | <a href="/tp3/index.php/Admin/Doc/edit/id/<?php echo ($fore["id"]); ?>">编辑</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
	<div class="pagin-list">
		<?php echo ($page); ?>
	</div>
	<div class="pxofy">共 <?php echo (count($data)); ?> 条记录</div>
</div>
</body>
<script type="text/javascript" src="/tp3/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/tp3/Public/Admin/plugins/layer/layer.js"></script>
<script type="text/javascript">

// 弹出层页面测试
// layer.alert();

// 给查看绑定点击事件
$(function(){
    $('.show').on('click',function(){
        var id = $(this).attr('data');
        var title = $(this).attr('data-title');
        // 开启一个弹窗
        layer.open({
            type: 2,
            title: title,
            shadeClose: true,
            shade: 0.8,
            area: ['600px', '90%'],
            content: '/tp3/index.php/Admin/Doc/showContent/id/'+id,
        }); 

    });
});


$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>