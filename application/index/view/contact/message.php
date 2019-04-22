<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>南昌为力人力资源-在线留言</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
</head>
<body>
{include file="/web/top"}
<div id="about_banner" class="center"></div>
<div id="about_main" class="center">
	<h2 class="center">在线留言
		<img src="__PUBLIC__images/xjt.jpg">
	</h2>
	<p>提供最有价值的人力资源服务和解决方案，持续为客户创造最大价值</p>
	<ul class="online_tit center">
	   <li><a href="{:url('/index/contact/index')}">联系我们</a></li>
	   <li class="xuangzhong"><a href="{:url('/index/contact/message')}">在线留言</a></li>	   
	</ul>
	<div id="message">
		<div class="advice">
			<h2>我们会做的更好！<br>
WE WILL DO BETTER</h2>
			<p>如果您对我们有什么建议、投诉、需求，可以通过<br>
留言告诉我们，我们会在第一时间了解并及时与您联系。</p>
			<li>THANKS !</li>
		</div>
		<form class="form1" id="form" method="post">
			<li>姓名：</li>
			<input class="mtext" type="text" name="names" id="names">
			<li>手机号码：</li>
			<input class="mtext" type="text" name="tel" id="mobile">
			<li>您的留言：</li>
			<textarea name="message" id="content"></textarea>
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
            var content = $("#content").val();
            if(!content){alert("请输入您的留言");$("#content").focus();return false;}
            
            var data = $("#form").serializeArray();
            $.ajax({
                 "type":"post",
                 "url"   :"/index/contact/addtsave",
                 "data"  : data,
                 "success":function(msg){
                     if(msg){
                        alert("留言成功");$("form")[0].reset();
                     }
                     else{
                        alert("留言失败");
                     }
                 }
            });
        })
    })
    </script>