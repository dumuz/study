<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻资讯-南昌为力人力资源</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="news_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">企业服务
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<ul class="entservice_tit center">
		{volist name="cla" id="class"}	
		{if condition="$class.id eq $classId"}<li class="xuangzhong"><a href="{:url('/index/company/index',['id'=>$class.id])}">{$class.sortname}</a></li>
			{else /}<li><a href="{:url('/index/company',['id'=>$class.id])}">{$class.sortname}</a></li>
		{/if}
		{/volist}
	</ul>
	<div class="news_detail">
		<h1>{$comp.title}</h1>
		<li>发布时间：{:date("Y-m-d H:i:s",$comp.addtime)}　　|　　浏览次数：{$comp.views}</li>
		<div>{$comp.intro}</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>
{include file="/web/bottom"}
</body>
</html>