<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>员工服务-南昌为力人力资源</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="staff_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">员工服务
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<ul class="news_tit center">
	{volist name="cla" id="class"}		
		{if condition="$class.id eq $classId"}<li class="xuangzhong"><a href="{:url('/index/staff/index',['id'=>$class.id])}">{$class.sortname}</a></li>
			{else /}<li><a href="{:url('/index/staff/index',['id'=>$class.id])}">{$class.sortname}</a></li>
		{/if}
	{/volist}
	</ul>
	{volist name="new" id="staff"}
	<div class="news_list">
		<li><span>{:date("d",$staff.addtime)}</span>{:date("Y-m",$staff.addtime)}</li>
		<a href="{:url('/index/staff/detailed',['id'=>$staff.id])}">
			<h1>{$staff.title}</h1>
			<p>{$staff.contents}</p>
		</a>
	</div>
	{/volist}
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>
{include file="/web/bottom"}
</body>
</html>