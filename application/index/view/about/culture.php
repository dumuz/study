<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们-南昌为力人力资源-企业文化</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="about_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">关于我们
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>坚持开源，不断创新</p>
	<ul class="about_tit center">
	   <li id="aboutus"><a href="{:url('/index/about')}">公司简介</a></li>
	   <li id="culture" class="click"><a href="{:url('/index/about/culture')}">企业文化</a></li>
	   <li id="honor"><a href="{:url('/index/about/honor')}">荣誉资质</a></li>
	</ul>
	<h3 class="center">企业文化
	    <li><li>
	</h3>	
	<div id="culture">
	<ul>
		<h3>为力管理理念</h3>
			<p>{$qywh.ldea}</p>
		<h3>为力愿景</h3>
			<p>{$qywh.vision}</p>
		<h3>为力用人理念</h3>
			<p>{$qywh.human}</p>
		<h3>为力核心理念</h3>
			<p>{$qywh.care}</p>
	</ul>
	<li><img src="__PUBLIC__uploads/{$qywh.pic}"></li>
	</div>
</div>
{include file="/web/bottom"}
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".about_tit>li").click(function(){
			$(this).css({background:"#008bd3",color:"#fff"}).siblings().css({background:"",color:""})
		})
	})
</script>