<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/jq/js/jquery.js"></script>
</head>
<body style="margin:0">
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>
    <div class="mainindex">
    <div class="welinfo">
    <span><img src="/images/images/sun.png" alt="天气" /></span>
    <b>{:Session('username')}早上好，欢迎使用信息管理系统</b>
    ({:Session('username')}@uimaker.com)
    <a href="{:url('/admin/ht/users/index')}">帐号设置</a>
    </div>
        <div class="welinfo">
        <span><img src="/images/images/time.png" alt="时间" /></span>
        <i>您上次登录的时间:
        <?php
            echo date("Y-m-d H:i:s",$row[0]['addtime']);
        ?>
        </i>(不是您登录的?<a href="{:url('/admin/ht/users/index')}">请点这里</a>)
        </div>
    </div>
</body>
</html>