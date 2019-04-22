<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>联系我们编辑页面</title>
{css href="__PUBLIC__css/style.css" /}
<script charset="utf-8" src="__PUBLIC__kindeditor/kindeditor-all-min.js"></script>
<script type="text/javascript">
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });    
</script>
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
    <form  action="{:url('/admin/ht/jobs/editsave')}" method="post" class="forminfo">
    <li><label>文章标题</label>
        <input name="title" id="title" type="text" value="{$rows.title}" class="dfinput" />
    </li>
    <li><label>类别类型:</label>
        <select name="classId" class="selected">
            <?php $list=lists(5);?>
            {volist name="list" id="row"} 
            <option value="{$id1=$row.id}" {$rows.classId=="$id1"?"selected":""}>
            {$row.sortname}
            </option>
            {/volist}
        </select>
    </li>
    <li><label>内容简介:</label>
        <textarea name="cont" class="textinput">{$rows.cont}</textarea>
    </li>
    <li><label>详细内容:</label>
        <textarea id="editor_id" name="intro" class="textinput">{$rows.intro}</textarea>
    </li>
    <li><label>浏览次数:</label>
        <input name="views" id="views" value="{$rows.views}" type="text" class="dfinput" />
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