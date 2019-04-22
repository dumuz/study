<link rel="stylesheet" type="text/css" href="__PUBLIC__css/web.css">
<div class="cls"></div>
<div id="footer">
	<div class="center">
	<?php 
		$result=think\Db::name('contacts')->limit(0,1)->find();
	?>
		<h2>南昌为力人力资源服务有限公司</h2>
		<p>联系电话： {$result['tel']}</p>
		<p>邮箱： {$result['email']}</p>
		<p>QQ：{$result['qq']}</p>
		<p>地址：{$result['ip']}</p>	
		<p>版权所有 © 2015-2018 江西为力人力资源有限公司   技术支持：南昌雅腾信息科技有限公司</p>
		<ul>
			<a href="{:url('/index')}">网站首页</a>
			<a href="{:url('/index/company')}">企业服务</a>
			<a href="{:url('/index/staff')}">员工服务 </a>
			<a href="{:url('/index/news')}">新闻资讯</a>
			<a href="{:url('/index/staff')}">求职招聘</a>
			<a href="{:url('/index/contact')}">联系我们</a>      
		</ul>
		<img src="__PUBLIC__images/ewm.jpg">
	</div>

</div>