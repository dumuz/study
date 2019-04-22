<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们-南昌为力人力资源</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery1.42.min.js"></script>
	<script src="__PUBLIC__jq/jquery.SuperSlide.2.1.1.js"></script>
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
	   <li id="culture"><a href="{:url('/index/about/culture')}">企业文化</a></li>
	   <li id="honor" class="click"><a href="{:url('/index/about/honor')}">荣誉资质</a></li>
	</ul>
	<h3 class="center">荣誉资质
	    <li><li>
	</h3>	
	<div class="rongyu_box">
		<div class="hd">
            <a class="next"><img src="__PUBLIC__images/left.png" alt=""></a>
            <a class="prev"><img src="__PUBLIC__images/right.png" alt=""></a>
        </div>
        <div class="bd">
            <ul>
            	{volist name="ryzz" id="ry"}
                <li><img src="__PUBLIC__uploads/{$ry.pic}" alt=""></li>
                {/volist}
                {volist name="ryzz" id="ry"}
                <li><img src="__PUBLIC__uploads/{$ry.pic}" alt=""></li>
                {/volist}
            </ul>
       </div>
	</div>	
</div>
<script>
    jQuery(".rongyu_box").slide({
        titCell:".hd ul",
        mainCell:".bd ul",
        autoPage:true,
        effect:"left",
        autoPlay:true,
        vis:3
    });
</script>
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