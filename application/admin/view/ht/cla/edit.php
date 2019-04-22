<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>类别编辑</title>
{css href="__PUBLIC__css/style.css" /}
</head>

<body>

    <div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="/admin/ht/cla/index">首页</a></li>
    <li><a href="#">编辑</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <form  action="{:url('/admin/ht/cla/editsave')}" method="post" class="forminfo">
    <li><label>类别名称</label><input name="sortname" id="sortname" type="text" class="dfinput" value="{$row.sortname}" /><i>类别名称最好为4个字符</i></li>
    <li><label>类别类型</label>
        <select name="type" class="selected">
                <option value="1" {$row.type=='1'?"selected":"";}>关于我们</option>
                <option value="2" {$row.type=='2'?"selected":"";}>新闻资讯</option>
                <option value="3" {$row.type=='3'?"selected":"";}>企业业务</option>
                <option value="4" {$row.type=='4'?"selected":"";}>员工服务</option>
                <option value="5" {$row.type=='5'?"selected":"";}>求职招聘</option>
                <option value="6" {$row.type=='6'?"selected":"";}>联系我们</option>
        </select>
    </li>
    <li><label>&nbsp;</label>
        <input type="hidden" name="page" value="{$page}" />
        <input type="hidden" name="id" value="{$row.id}">
        <input name="" type="submit" class="btn" value="确认保存"/>
    </li>
    </form>
    
    
    </div>


</body>

</html>