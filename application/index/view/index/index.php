<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>南昌为力人力资源服务有限公司-主营人力资源服务外包,代招聘,招聘流程外包（HR外包）</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
	<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"> </script>
    <script type="text/javascript" src="__PUBLIC__jq/jquery.banner.js"></script>
</head>
<body>
{include file="/web/top"/}
<!-- 首页轮播 -->
<div class="banner">
	<ul class="banList">
		<li class="active"><a href=""><img src="__PUBLIC__images/img1.jpg"/></a>
		</li>
		<li><a href=""><img src="__PUBLIC__images/img2.jpg"/></a></li>
		<li><a href=""><img src="__PUBLIC__images/img3.jpg"/></a></li>
	</ul>
	<div class="fomW">
		<div class="jsNav">
			<a href="javascript:;" class="trigger current"></a>
			<a href="javascript:;" class="trigger"></a>
			<a href="javascript:;" class="trigger"></a>
		</div>
	</div>
</div>
<script type="text/javascript"> 
$(function(){
	$(".banner").swBanner();
});
</script>

<!-- 首页中间模块 -->
<div class="main1 center">
	<div class="main_zixun">
        <div class="main_title">
        	<li class="ontt" _src="{:url('/index/news',['classId'=>66])}">公司动态</li>
			<li _src="{:url('/index/news',['classId'=>67])}">行业快讯</li>
			<a href="{:url('/index/news/')}">更多>></a>
        </div>
        <ul>
           <li>
            {volist name="rows" id="res"}
	        <ul class="main_zixun_list" >
		        <a href="{:url('/index/news/detailed',['id'=>$res.id])}">
		            <img src="__PUBLIC__uploads/{$res.pic}">
	            	<h2>{$res.title|mb_substr=0,18,'utf-8'}</h2>
	            	<p>{$res.describe|mb_substr=0,36,'utf-8'}...</p>  
		        </a>
	        </ul>
	        {/volist}
        </li>
       	<li class="none">
	        {volist name="hy" id="hyzx"}
	        <ul class="main_zixun_list">
		        <a href="{:url('/index/news/detailed',['id'=>$hyzx.id])}">
		            <img src="__PUBLIC__uploads/{$hyzx.pic}">
	            	<h2>{$hyzx.title|mb_substr=0,16,'utf-8'}</h2>
	            	<p>{$hyzx.describe|mb_substr=0,36,'utf-8'}...</p>  
		        </a>
	        </ul>
	        {/volist}
	        </li>
        </ul>
	</div>
	<div class="main_zcfg">
		<div class="main_title">
        	<li class="ontt">政策法规</li>
			<a href="{:url('/index/news',['classId'=>68])}">更多>></a>
        </div>
        {volist name="zc" id="zcs"}
        <li class="zcfg">
        <a href="{:url('/index/news/detailed',['id'=>$zcs.id])}">{$zcs.title|mb_substr=0,18,'utf-8'}...</a>
        </li>
        {/volist}
	</div>
	<div class="main_tab">
		<a href="http://120.203.70.4:8006/uaa/personlogin#/personLogin">
			<img src="__PUBLIC__images/xiangmu1_h.png">
			<li>社保查询</li>
		</a>
		<a href="http://www.ncgjj.com.cn:8081/wt-web/login">
			<img src="__PUBLIC__images/xiangmu2_h.png">
			<li>公积金查询</li>
		</a>
		<a href="{:url('/index/staff/index')}">
			<img src="__PUBLIC__images/xiangmu3_h.png">
			<li>学历提升</li>
		</a>
		<a href="{:url('/index/baomin/index')}">
			<img src="__PUBLIC__images/xiangmu3_h.png">
			<li>网上报名</li>
		</a>
	</div>
</div>	
<script type="text/javascript">
$(function(){
	$(".main_title>li").hover(function(){
		var index = $(this).index();
		var _src = $(this).attr("_src");
	    $(this).siblings("a").attr("href",_src);
		$(this).addClass("ontt").siblings().removeClass("ontt");
		$(".main_zixun>ul>li").eq(index).show().siblings().hide();

	});
	$(".main_tab>a").hover(
		function(){
			var $num = $(this).index();
			$num =$num+1;

			$(this).children("li").css({color:"#008bd3"});
			$(this).children("img").attr("src","__PUBLIC__images/xiangmu"+$num+"_l.png");
	    },
	    function(){
	    	var $num = $(this).index();
			$num =$num+1;
	    	$(this).children("li").css({color:""});
			$(this).children("img").attr("src","__PUBLIC__images/xiangmu"+$num+"_h.png");
	    }

	)
	    
})
</script>

<!-- 首页中间模块-招聘求职 -->
<div class="main2 center">
    <div class="center">
		<h2 class="main2_tit"><span>招聘求职</span></h2>
		<p class="main2_intro">江西为力人力资源服务有限公司为企业提供最好、最专业的服务外包、招聘猎头、员工福利和</br>人事服务等相关人力资源解决方案
		</p>
		<div class="main_recruit">
			<div class="main_title">
	        	<li class="ontt">招聘信息</li>
				<a href="{:url('/index/recruit/')}">更多>></a>
        	</div>
        	<img src="__PUBLIC__images/zp1.jpg">
        	<ul>
        	   {volist name="zp" id="zpxx"}
        	   <li class="zcfg">
        	   		<a href="{:url('/index/recruit',['id'=>$zpxx.id])}">中国电信公司（莲塘）
        	   			<span>{$zpxx.title}</span>
        	   		</a>
        	   </li>
        	   {/volist}
        	</ul> 	
		</div>
		<div class="main_qiuzhi">
			<div class="main_title">
	        	<li class="ontt">在线求职</li>	
        	</div>
        	<form>
				<li>你的姓名：<input class="inttext" type="text" name="names" id="names">
				</li>
				<li>选择性别：
					<input type="radio" name="sex" checked="" value="男">男
					<input type="radio" name="sex" value="女">女
				</li>
				<li>手机号码：<input class="inttext" type="text" name="tel" id="mobile">
				</li>
				<li>意向工作：<input class="inttext" type="text" name="work" id="will"></li>
				<li><input class="bt" type="button" value="提交" id="sub"></li>		
			</form>
		</div>
    </div>
</div>

<!-- 首页中间模块-核心服务 -->
<div class="main3 center">
	<h2 class="main2_tit"><span>核心服务</span></h2>
	<p class="main2_intro">江西为力人力资源服务有限公司为企业提供最好、最专业的服务外包、招聘猎头、员工福利和</br>人事服务等相关人力资源解决方案
	</p>
	<a href="{:url('/index/company/')}">
		<img src="__PUBLIC__images/hxff1.jpg">
		<div>
			<h2>劳务派遣</h2>
			<p>劳务派遣是企业将一些非核心员工外包给劳务公司，其特征就是劳动力的雇佣和...</p>
		</div>
	</a>
	<a href="{:url('/index/company/')}">
		<img src="__PUBLIC__images/hxff2.jpg">
		<div>
			<h2>服务外包</h2>
			<p>劳务外包是企事业单位将某个岗位（特别是一些人员流动比较大、力资源服务...</p>
		</div>
	</a>
	<a href="{:url('/index/company/')}">
		<img src="__PUBLIC__images/hxff3.jpg">
		<div>
			<h2>代交社保</h2>
			<p>社保代理是劳动保障事务代理中的一种代理方式，指由专业的人力资源公司，按照...</p>
		</div>
	</a>

</div>

<!-- 首页-友情链接 -->
<li id="friend">
		<span>友情链接:</span>
		<a href="http://www.ncwlrl.com/">南昌为力人力资源有限公司</a>
		<a href="http://www.ncyateng.com">南昌雅腾科技有限公司</a>
		<a href="http://www.jxhrss.gov.cn">江西省人社厅</a>
		<a href="http://www.jxrcw.com">江西人才网</a>
		<a href="http://rsj.nc.gov.cn">南昌市人保局</a>
		<a href="http://www.ncyteng.com">南昌市职业技术中心</a>
</li>
{include file="/web/bottom"/}
</body>
</html>
<script>
    $(function(){
        $("#sub").on("click",function(){
            var names = $("#names").val();
            if(!names){alert("请输入姓名");$("#names").focus();return false;}
            var sex = $("input[name='sex']:checked").val();
            var mobile = $("#mobile").val();
            if(!mobile){alert("请输入手机号码");$("#mobile").focus();return false;}
            if(!(/^1[34578]\d{9}$/.test(mobile))){ 
		        alert("手机号码有误，请重填"); $("#mobile").focus(); 
		        return false; 
		    } 
            var will = $("#will").val();
            if(!will){alert("请输入意向工作");$("#will").focus();return false;}
            
            var data = $("form").serializeArray();
            $.ajax({
            	 "type":"post",
            	 "url"   :"/admin/ht/recruit/addtsave",
            	 "data"  : data,
            	 "success":function(msg){
            	 	 if(msg){
            	 	 	alert("提交成功");$("form")[0].reset();
            	 	 }
            	 	 else{
            	 	 	alert("提交失败");
            	 	 }
            	 }
            });
        })
    })
    </script>

