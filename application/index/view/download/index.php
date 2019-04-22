<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>下载中心-南昌为力人力资源</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="about_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">下载中心
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<div id="loaddown">
		<li >
			<dd>名称</dd>
			<dd>发布时间</dd>
			<dd>下载</dd>
		</li>
		{volist name="down" id="downs"}
		<li>
			<dd>{$downs.title}</dd>
			<dd>{:date("Y-m-d",$downs.addtime)}</dd>
			<dd><a href="/uploads/{$downs.file}" target="_blank" download="ok" class="down" down_id="{$downs.id}" >立即下载</a></dd>
		</li>
		{/volist}
	</div>
</div>
{include file="/web/bottom"}
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$(".down").click(function(){
		var id=$(this).attr("down_id");
		//console.log(id);
		var data={id:id};
		$.ajax({
			type:"post",
			url:"{:url('index/download/downcount')}",
			data:data,
			datatype:"json",
			success:function(ret){
				if(ret.msg==1){
					location.reload();
				}
			}
		})
	})
});
</script>