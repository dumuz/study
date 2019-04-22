<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>员工服务-南昌为力人力资源-详情页面</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="news_banner" class="center"></div>
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
	<div class="news_detail">
		<h1>{$new.title}</h1>
		<li>发布时间：{:date("Y-m-d H:i:s",$new.addtime)}　　|　　浏览次数：{$new.views}</li>
		<div>{$new.intro}</div>
	</div>
	<div class="sxpian">
		{if condition="($res1)"}
			<li>上一篇：<a href="{:url('/index/staff/detailed',['id'=>$res1.id])}">{$res1.title}</a></li>
		{else/}	<li>上一篇：没有了</li>
		{/if}
		{if condition="($res2)"}
			<ol>下一篇：<a href="{:url('/index/staff/detailed',['id'=>$res2.id])}">{$res2.title}</a></ol>
			{else/}	<ol>下一篇：没有了</ol>
		{/if}
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>
{include file="/web/bottom"}
</body>
</html>