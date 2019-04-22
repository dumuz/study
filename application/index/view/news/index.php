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
	<h2 class="center">新闻资讯
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<ul class="news_tit center">
	{volist name="cla" id="class"}		
		{if condition="$class.id eq $classId"}<li class="xuangzhong"><a href="{:url('/index/news/index',['id'=>$class.id])}">{$class.sortname}</a></li>
			{else /}<li><a href="{:url('/index/news/index',['id'=>$class.id])}">{$class.sortname}</a></li>
		{/if}
	{/volist}
	</ul>
	{volist name="new" id="news"}
	<div class="news_list">
		<li><span>{:date("d",$news.addtime)}</span>{:date("Y-m",$news.addtime)}</li>
		<a href="{:url('/index/news/detailed',['id'=>$news.id])}">
			<h1>{$news.title}</h1>
			<p>{$news.describe}</p>
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