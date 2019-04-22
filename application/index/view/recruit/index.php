<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>求职招聘-南昌为力人力资源-求职招聘</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="about_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">求职招聘
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<ul class="recruit_tit center">
	   <li class="xuangzhong"><a href="{:url('/index/recruit/index')}">招聘信息</a></li>
	   <li><a href="{:url('/index/recruit/online')}">在线求职</a></li>
	{volist name="cla" id="class"}
		{if condition="$class.id eq $classId"}<li class="xuangzhong"><a href="{:url('/index/recruit/jobs',['id'=>$class.id])}">{$class.sortname}</a></li>
			{else /}<li><a href="{:url('/index/recruit/jobs',['id'=>$class.id])}">{$class.sortname}</a></li>
		{/if}
	{/volist}	   
	</ul>	
	<div class="recruit_list">
		<li >
			<dd>招聘岗位</dd>
			<dd>招聘部门</dd>
			<dd>学历要求</dd>
			<dd>预计薪资</dd>
			<dd>招聘人数</dd>
			<dd>发布时间</dd>
		</li>
	{volist name="zpxx" id="zp"}
		<li class="bg1" >
			<dd>{$zp.title}</dd>
			<dd>{$zp.department}</dd>
			<dd>{$zp.educational}</dd>
			<dd>{$zp.salary}</dd>
			<dd>{$zp.numbers}</dd>
			<dd>{:date("Y-m-d",$zp.addtime)}</dd>
			<ul class="xiangxi">
				<h3>岗位职责：</h3>
				<p>{$zp.duty}</p>
				<h3>岗位要求：</h3>
				<p>{$zp.demand}</p>
				<h3>福利待遇：</h3>
				<p>{$zp.welfare}</p>
			</ul>
		</li>
	{/volist}
	</div>	
	<li id="page"><span>共{$total}条，每页显示5条</span>{$zpxx->render()}</li>
</div>
<script type="text/javascript">

	$(document).ready(function(){

		$(".recruit_list>li").click(function(){
			
			if($(this).attr("class")=="bg1"){
				$(this).removeClass("bg1").addClass("bg2");
			}
			else{
				$(this).removeClass("bg2").addClass("bg1");
			}
			$(this).children("ul").toggle();
		})
	})
</script>
{include file="/web/bottom"}
</body>
</html>