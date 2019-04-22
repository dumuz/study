<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线留言添加页面</title>
{css href="__PUBLIC__css/style.css" /}
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">在线留言</a></li>
    <li><a href="#">添加</a></li>
    </ul>
</div>

<div class="formbody">

<div class="formtitle"><span>基本信息</span></div>   
    <form  action="{:url('/admin/ht/contacts/addsave')}" method="post" class="forminfo">
    <li><label>类别类型:</label>
        <select name="classId" class="selected">
            <?php $list=lists(6);?>
            {volist name="list" id="row"} 
            <option value="{$id1=$row.id}">
            {$row.sortname}
            </option>
            {/volist}
        </select>
    </li>
    <li><label>姓名:</label>
        <input name="names" id="names" type="text" class="dfinput" />
    </li>
    <li><label>联系电话:</label>
        <input name="tel" id="tel" type="text" class="dfinput" />
    </li>
    <li><label>您的留言:</label>
            <textarea id="" name="message" class="textinput"></textarea>
    </li>
    <li><label>&nbsp;</label>
        <input name="" type="submit" class="btn" value="确认保存"/>
    </li>
    </form>
</div>
</body>
</html>