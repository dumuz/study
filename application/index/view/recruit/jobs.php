<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>求职招聘-南昌为力人力资源</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="news_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">求职招聘
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<ul class="recruit_tit center">
	   <li><a href="{:url('/index/recruit/index')}">招聘信息</a></li>
	   <li><a href="{:url('/index/recruit/online')}">在线求职</a></li>
	{volist name="cla" id="class"}
		{if condition="$class.id eq $classId"}<li class="xuangzhong"><a href="{:url('/index/recruit/jobs',['id'=>$class.id])}">{$class.sortname}</a></li>
			{else /}<li><a href="{:url('/index/recruit/jobs',['id'=>$class.id])}">{$class.sortname}</a></li>
		{/if}
	{/volist}
	</ul>
	{volist name="new" id="others"}
	<div class="news_list">
		<li><span>{:date("d",$others.addtime)}</span>{:date("Y-m",$others.addtime)}</li>
		<a href="">
			<h1>{$others.title}</h1>
			<p>{$others.cont}</p>
		</a>
	</div>
	{/volist}
	<li id="page"><span>共{$total}条，每页显示5条</span>{$new->render()}</li>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>
{include file="/web/bottom"}
</body>
</html>