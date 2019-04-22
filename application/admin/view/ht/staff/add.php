<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>员工服务添加页面</title>
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
    <li><a href="#">类别</a></li>
    <li><a href="#">添加</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <form action="{:url('/admin/ht/staff/addsave')}" method="post" class="forminfo">
    <li><label>文章标题</label>
        <input name="title" id="title" type="text" class="dfinput" />
    </li>
    <li><label>类别类型</label>
        <select name="classId" class="selected">
            {volist name="result" id="row"}
                <option value="{$row.id}">{$row.sortname}</option>
            {/volist}
        </select>
    </li>
    <li><label>文章简介:</label>
        <textarea name="contents" class="textinput"></textarea>
    </li>
    <li><label>详细内容:</label>
            <textarea id="editor_id" name="intro" class="textinput"></textarea>
    </li>
    <li><label>浏览次数</label>
        <input name="views" id="views" type="text" class="dfinput" />
    </li>
    <li><label>&nbsp;</label>
        <input name="" type="submit" class="btn" value="确认保存"/>
    </li>
    </form>

    </div>

</body>
</html>
