<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>联系我们编辑页面</title>
{css href="__PUBLIC__css/style.css" /}
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">联系我们</a></li>
    <li><a href="#">编辑</a></li>
    </ul>
</div>

<div class="formbody">

<div class="formtitle"><span>基本信息</span></div>   
    <form  action="{:url('/admin/ht/contacts/editsave')}" method="post" class="forminfo">
    <li><label>类别类型:</label>
        <select name="classId" class="selected">
            <?php $list=lists(6);?>
            {volist name="list" id="row"} 
            <option value="{$id1=$row.id}" {$rows.classId=="$id1"?"selected":""}>
            {$row.sortname}
            </option>
            {/volist}
        </select>
    </li>
    <li><label>联系电话:</label>
        <input name="tel" id="tel" value="{$rows.tel}" type="text" class="dfinput" />
    </li>
    <li><label>QQ:</label>
        <input name="qq" id="qq" value="{$rows.qq}" type="text" class="dfinput" />
    </li>
    <li><label>电子邮箱:</label>
        <input name="email" id="email" value="{$rows.email}" type="text" class="dfinput" />
    </li>
    <li><label>IP地址:</label>
        <textarea id="ip" name="ip" class="textinput">{$rows.ip}</textarea>
    </li>
    <li><label>&nbsp;</label>
        <input type="hidden" name="id" value="{$rows.id}">
        <input type="hidden" name="page" value="{$page}">
        <input name="" type="submit" class="btn" value="确认保存"/>
    </li>
    </form>
</div>
</body>
</html>