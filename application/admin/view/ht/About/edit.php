<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们编辑</title>
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
    <li><a href="/admin/ht/about/index">首页</a></li>
    <li><a href="#">编辑</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <form  action="{:url('/admin/ht/about/editsave')}" method="post" class="forminfo" enctype="multipart/form-data">
    <li><label>类别名称</label>
        <select name="classId" class="selected">
            <?php $list=lists(1);?>
            {volist name="list" id="row"} 
            <option value="{$id1=$row.id}" {$rows.classId=="$id1"?"selected":""}>
            {$row.sortname}
            </option>
            {/volist}
        </select>
    </li>
    <li><label>管理理念</label>
    <input name="ldea" id="ldea" type="text" value="{$rows.ldea}" class="dfinput" />
    </li>
    <li><label>为力愿景:</label>
        <input type="text" name="vision" value="{$rows.vision}" class="dfinput">
    </li>
    <li><label>用人理念:</label>
        <input type="text" name="human" value="{$rows.human}" class="dfinput">
    </li>
    <li><label>核心理念:</label>
        <textarea name="care" class="textinput">{$rows.care}</textarea>
    </li>
    <li><label>上传文件:</label>
            <input type="file" name="pic">{$rows.pic}
            <div><?php $pic='__PUBLIC__uploads/'.$rows["pic"];
            echo "<img src='$pic' style='max-width:100px;'>" ?></div>
    </li>
    <li><label>内容:</label>
            <textarea id="editor_id" name="intro" class="textinput">{$rows.intro}</textarea>
    </li>
    
    <li><label>&nbsp;</label>
    <input type="hidden" name="id" value="{$rows.id}">
    <input name="" type="submit" class="btn" value="确认保存"/></li>
    </form>
    
    
    </div>


</body>

</html>