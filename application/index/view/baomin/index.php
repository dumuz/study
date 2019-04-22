<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>南昌为力人力资源-网上报名</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="news_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">网上报名
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<div id="message">
		<img src="__PUBLIC__images/wsbm.jpg">
		<form class="form" id="for">
			<li>姓名：</li>
			<input id="names" type="text" name="names" class="mtext">
			<li>手机号码：</li>
			<input class="mtext" type="text" name="tel" id="mobile">
			<li>报名科目：</li>
			<textarea name="intro" id="will"></textarea>
			<li>
				<input type="button" value="提交" id="sub">
			</li>
		</form>
	</div>
</div>
{include file="/web/bottom"}
</body>
</html>
<script>
    $(function(){
        $("#sub").on("click",function(){
            var names = $("#names").val();
            if(!names){alert("请输入姓名");$("#names").focus();return false;}
            var mobile = $("#mobile").val();
            if(!mobile){alert("请输入手机号码");$("#mobile").focus();return false;}
            if(!(/^1[34578]\d{9}$/.test(mobile))){ 
		        alert("手机号码有误，请重填"); $("#mobile").focus(); 
		        return false; 
		    } 
            var will = $("#will").val();
            if(!will){alert("请输入报名科目");$("#will").focus();return false;}
            
            var data = $("#for").serializeArray();
            $.ajax({
            	 "type":"post",
            	 "url"   :"/index/recruit/addtsave",
            	 "data"  : data,
            	 "success":function(msg){
            	 	 if(msg){
            	 	 	alert("添加成功");$("form")[0].reset();
            	 	 }
            	 	 else{
            	 	 	alert("添加失败");
            	 	 }
            	 }
            });
        })
    })
</script>
