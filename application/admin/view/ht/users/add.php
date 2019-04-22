<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户添加页面</title>
{css href="__PUBLIC__css/style.css" /}
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">用户</a></li>
    <li><a href="#">添加</a></li>
    </ul>
</div>

<div class="formbody">

<div class="formtitle"><span>基本信息</span></div>   
    <form  action="{:url('/admin/ht/users/addsave')}" method="post" class="forminfo">
    <li><label>用户名:</label>
        <input name="username" id="username" type="text" class="dfinput" />
    </li>
    <li><label>密码:</label>
        <input name="password" id="password" type="password" class="dfinput" />
    </li>
    <li><label>验证码:</label>
        <span><input type="text" name="code" placeholder="请输入验证码" style="border:1px solid #ced9df; width:80px; height:30px">
        <i>*看不清点击图片换一张</i>
        </span>
        <span><img src="{:url('/admin/ht/users/getcode')}" onclick="this.src='{:url('/admin/ht/users/getcode')}'+'?rand='+Math.random()" alt="captcha">
        </span>
    </li>
    <li><label>&nbsp;</label>
        <input name="" type="submit" class="btn" value="注册"/>
    </li>
    </form>
</div>
</body>
</html>