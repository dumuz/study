<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>招聘信息添加页面</title>
{css href="__PUBLIC__css/style.css" /}
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">招聘信息</a></li>
    <li><a href="#">添加</a></li>
    </ul>
</div>

<div class="formbody">

<div class="formtitle"><span>基本信息</span></div>   
    <form  action="{:url('/admin/ht/recruit/addosave')}" method="post" class="forminfo">
    <li><label>招聘岗位:</label>
        <input name="title" id="title" type="text" class="dfinput" />
    </li>
    <li><label>招聘部门:</label>
        <input name="department" id="department" type="text" class="dfinput" />
    </li>
    <li><label>学历要求:</label>
        <input name="educational" id="educational" type="text" class="dfinput" />
    </li>
    <li><label>预计薪资:</label>
        <input name="salary" id="salary" type="text" class="dfinput" />
    </li>
    <li><label>招聘人数:</label>
        <input name="numbers" id="numbers" type="text" class="dfinput" />
    </li>
    <li><label>岗位职责:</label>
        <textarea id="duty" name="duty" class="textinput"></textarea>
    </li>
    <li><label>岗位要求:</label>
        <textarea id="demand" name="demand" class="textinput"></textarea>
    </li>
    <li><label>福利待遇:</label>
        <textarea id="welfare" name="welfare" class="textinput"></textarea>
    </li>
    <li><label>&nbsp;</label>
        <input name="" type="submit" class="btn" value="确认保存"/>
    </li>
    </form>
</div>
</body>
</html>