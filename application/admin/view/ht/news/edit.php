<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻资讯编辑</title>
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
    <li><a href="/admin/ht/news/index">首页</a></li>
    <li><a href="#">编辑</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <form  action="{:url('/admin/ht/news/editsave')}" method="post" class="forminfo" enctype="multipart/form-data">
    <li><label>文章标题</label>
        <input name="title" id="title" type="text" class="dfinput" value="{$rows.title}" />
    </li>
    <li><label>类别名称</label>
        <select name="classId" class="selected">
            <?php $list=lists(2);?>
            {volist name="list" id="row"} 
            <option value="{$id1=$row.id}" {$rows.classId=="$id1"?"selected":""}>
            {$row.sortname}
            </option>
            {/volist}
        </select>
    </li>
    <li><label>文章简介:</label>
        <textarea name="contents" class="textinput">{$rows.contents}</textarea>
    </li>
    <li><label>简单描述:</label>
        <textarea name="describe" class="textinput">{$rows.describe}</textarea>
    </li>
    <li><label>上传文件:</label>
            <input type="file" name="pic">{$rows.pic}
            <div><?php $pic='__PUBLIC__uploads/'.$rows["pic"];
            echo "<img src='$pic' style='max-width:100px;'>" ?></div>
    </li>    
    <li><label>详细内容:</label>
            <textarea id="editor_id" name="intro" class="textinput">{$rows.intro}</textarea>
    </li>
    <li><label>浏览次数:</label>
        <input type="text" name="views" value="{$rows.views}" class="dfinput">
    </li>
    <li><label>&nbsp;</label>
    <input type="hidden" name="id" value="{$rows.id}">
    <input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>   
    </div>
</body>
</html>