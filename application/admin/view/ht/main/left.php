<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jq/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>管理中心</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/images/images/leftico01.png" /></span>信息管理
    </div>
    	<ul class="menuson">
        <li class="active"><cite></cite><a href="{:url('/admin/ht/main/indexframe')}" target="rightFrame">首页</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/cla/index')}" target="rightFrame">类别管理</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/about/index')}" target="rightFrame">关于我们</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/company/index')}" target="rightFrame">企业服务</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/news/index')}" target="rightFrame">新闻资讯</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/staff/index')}" target="rightFrame">员工服务</a><i></i>
        </li>
        </ul>
    </dd>
    <dd>
    <div class="title">
    <span><img src="/images/images/leftico02.png" /></span>联系我们
    </div>
        <ul class="menuson">
        <li><cite></cite><a href="{:url('/admin/ht/contacts/indexus')}" target="rightFrame">联系我们</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/contacts/index')}" target="rightFrame">在线留言</a><i></i>
        </li>
        </ul>
    </dd>
    <dd>
    <div class="title">
    <span><img src="/images/images/leftico03.png" /></span>求职招聘
    </div>
        <ul class="menuson">
        <li><cite></cite><a href="{:url('/admin/ht/recruit/indexo')}" target="rightFrame">招聘信息</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/online/indext')}" target="rightFrame">在线求职</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/jobs/index')}" target="rightFrame">其他</a><i></i>
        </li>
        </ul>
    </dd>         
    <dd>
    <div class="title"><span><img src="/images/images/leftico04.png" /></span>系统管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{:url('/admin/ht/users/index')}" target="rightFrame">用户资料</a><i></i>
        </li>
        <li><cite></cite><a href="{:url('/admin/ht/download/index')}" target="rightFrame">下载中心</a><i></i>
        </li>
    </ul>    
    </dd>
    
    </dl>
    
</body>
</html>
