<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线求职添加页面</title>
{css href="__PUBLIC__css/style.css" /}
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">在线求职</a></li>
    <li><a href="#">添加</a></li>
    </ul>
</div>

<div class="formbody">

<div class="formtitle"><span>基本信息</span></div>   
    <form  action="{:url('/admin/ht/online/indext')}" method="post" class="forminfo">
    <li><label>姓名:</label>
        <input name="names" id="names" type="text" value="{$rows.names}" class="dfinput" />
    </li>
    <li><label>性别:</label>
        <input type="radio" name="sex" value="男" checked>男
        <input type="radio" name="sex" value="女">女
    </li>
    <li><label>手机号码:</label>
        <input name="tel" id="tel" type="text" value="{$rows.tel}" class="dfinput" />
    </li>
    <li><label>意向工作:</label>
        <textarea id="intro" name="intro" class="textinput">{$rows.intro}</textarea>
    </li>
    <li><label>&nbsp;</label>
        <input name="" type="submit" class="btn" value="返回"/>
    </li>
    </form>
</div>
</body>
</html>