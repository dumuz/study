<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们-南昌为力人力资源-公司简介</title>
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
	   <li id="aboutus" class="click"><a  href="{:url('/index/about')}">公司简介</a></li>
	   <li id="culture"><a  href="{:url('/index/about/culture')}">企业文化</a></li>
	   <li id="honor"><a  href="{:url('/index/about/honor')}">荣誉资质</a></li>
	</ul>
	<img src="__PUBLIC__uploads/{$gs.pic}">
	<div id="about">
		<div class="about_title">
			<li>公司简介</li>
		</div>
		<p>
			{$gs['intro']}
		</p>
	</div>
	<div class="cls"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".about_tit>li").click(function(){
			$(this).css({background:"#008bd3",color:"#fff"}).siblings().css({background:"",color:""})
		})
	})
</script>
{include file="/web/bottom"}
</body>
</html>