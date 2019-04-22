<div id="tops">
   <div class="center">
		<img src="__PUBLIC__images/logo.png">
		<li class="tel">全国服务热线：<span>0791-82203969</span></li>
		<div class="search">
			<form action=""  id="formsearch">
				<input type="text" name="keyword" placeholder="请输入搜索关键词">
				<a href="" ><img src="__PUBLIC__images/sou.png"></a>
			</form>
		</div>
		<div class="nav">
		  <li>
			<a href="{:url('/index')}">网站首页</a>
		  </li>
		  <li>
			<a href="{:url('/index/about')}">关于我们</a>
			<ul>
			    <a href="{:url('/index/about')}">公司简介</a>
				<a href="{:url('/index/about/culture')}">企业文化</a>
				<a href="{:url('/index/about/honor')}">荣誉资质</a>
			</ul>
		  </li>
		  <li>
			<a href="{:url('/index/news/index')}">新闻资讯</a>
			<ul>
				<?php
					use think\Db;
					$result=Db::name('class')->where('type','2')->select();	
				?>
				{volist name="result" id="row"}
				<a href="{:url('/index/news',['id'=>$row.id])}">{$row.sortname}</a>
				{/volist}
			</ul>
		  </li>
		  <li>
			<a href="{:url('/index/company')}">企业服务</a>
			<ul>
			    <?php
					$result=Db::name('class')->where('type','3')->select();	
				?>
				{volist name="result" id="row"}
				<a href="{:url('/index/company',['id'=>$row.id])}">{$row.sortname}</a>
				{/volist}
			</ul>
		  </li>
		  <li>
			<a href="{:url('/index/staff')}">员工服务</a>
			<ul>
			    <?php
					$result=Db::name('class')->where('type','4')->select();	
				?>
				{volist name="result" id="row"}
				<a href="{:url('/index/staff',['id'=>$row.id])}">{$row.sortname}</a>
				{/volist}
			</ul>
		  </li>
		  <li>
			<a href="{:url('/index/recruit')}">求职招聘</a>
		  </li>
		  <li>
			<a href="{:url('/index/contact')}">联系我们</a>
			<ul>
			    <a href="{:url('/index/contact')}">联系我们</a>
				<a href="{:url('/index/contact/message')}">在线留言</a>
			</ul>
		  </li>
		  <li>
			<a href="{:url('/index/download')}">下载中心</a>
		  </li>
		</div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".nav>li").hover(
	  function () {
	  	$(this).children("ul").fadeIn();
	    
	  },
	  function () {
	  	$(this).children("ul").fadeOut();
	  }
	);
	$(".nav>li>ul>a").hover(
	  function () {
	  	$(this).css({background:"#008bd3",color:"#fff"});
	  },
	  function () {
	  	$(this).css({background:"",color:""});
	  });
	
	var noves = 0;
    $(function(){
        var url = window.location.pathname; //获取域名后面相应的链接
        /*if(url.indexOf("/web/index/index.html")>=0){

        }else*/ 
        if(url.indexOf("/index/about")>=0){
            noves = 1;
        }else if(url.indexOf("/index/news")>=0){
            noves = 2;
        }else if(url.indexOf("/index/company")>=0){
            noves = 3;
        }else if(url.indexOf("/index/staff")>=0){
            noves = 4;
        }else if(url.indexOf("/index/recruit")>=0){
            noves = 5;
        }else if(url.indexOf("/index/contact")>=0){
            noves = 6;
        }else if(url.indexOf("/index/download")>=0){
            noves = 7;
        }
        $('.nav>li').eq(noves).addClass("on").siblings().removeClass('on');
        //on为.navs>li点击样式
        $('.nav>li').eq(noves).children("a").css("color","#fff7f4");
    })
})
</script>