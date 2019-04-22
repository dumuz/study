<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业服务添加页面</title>
{css href="__PUBLIC__css/style.css" /}
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
    
    <form  action="{:url('/admin/ht/download/addsave')}" method="post" class="forminfo" enctype="multipart/form-data">
    <li><label>下载名称</label>
        <input name="title" id="title" type="text" class="dfinput" />
    </li>
    <li><label>下载文件:</label>
        <input type="file" name="file" id="files">
    </li>
    <li><label>下载次数</label>
        <input name="views" id="views" type="text" class="dfinput" />
    </li>
    <li><label>&nbsp;</label>
        <input name="" type="submit" class="btn" value="确认保存"/>
    </li>
    </form>

    </div>
</body>
</html>