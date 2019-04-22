<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查询</title>
{css href="__PUBLIC__css/style.css" /}
<script type="text/javascript" src="__PUBLIC__jq/jquery-3.3.1.js"></script>
<script type="text/javascript" src="__PUBLIC__layer/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="/admin/ht/about/index">首页</a></li>
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
        <ul class="toolbar"> 
        <a href="/admin/ht/about/add"><li class="click"><span><img src="/images/images/t01.png" /></span>添加</li></a>
        </ul>
                
        <ul class="toolbar1">
        <li><span><img src="/images/images/t05.png" /></span>设置</li>
        </ul>
    
    </div>

    <form action="/admin/ht/cla/dels" method="post"> 
    <table class="tablelist">
        <thead>
        <tr>
        <th width="60">选择</th>
        <th >编号<i class="sort"><img src="/images/images/px.gif" /></i></th>
        <th width="120">类别类型</th>
        <th width="140">管理理念</th>
        <th width="140">为力愿景</th>
        <th width="140">用人理念</th>
        <th width="240">核心理念</th>
        <th width="140">图片</th>
        <th width="110">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {volist name="result" id="row"}
            <tr>
            <td><input type="checkbox" name="ids[]" value="{$row.id}"></td>
            <td>{$row.id}</td>
            <td>{$row.sortname}</td>
            <td>{$row.ldea}</td>
            <td>{$row.vision}</td>
            <td>{$row.human}</td>
            <td>{$row.care}</td>
            <td style='text-align:center;text-indent:0px;padding-top:10px;'><img src='__PUBLIC__uploads/{$row.pic}' style='width:120px;'/></td>
            <td>
                <a href="{:url('/admin/ht/about/edit',['id'=>$row.id])}" id="jbb">编辑</a>&nbsp&nbsp
                <a href="{:url('/admin/ht/about/dels',['id'=>$row.id])}" id="jbb">删除</a>
            </td>
        </tr>
        {/volist}
        </tr>
        </tbody>
        <tr>
            <td colspan="10" style="padding:12px; text-align:left;">
                <input type="button" value="全选" id="checkall" style="font-size:18px; margin-top:8px;">
                <input type="button" value="反选" id="checkother" style="font-size:18px; margin-top:8px; margin-left:8px;">
                <input type="button" value="多选删除"  id="dels" style="font-size:18px; margin-top:8px; margin-left:8px;">
            </td>
        </tr>
        <tr>
            <td colspan="10">
                {$result->render()}
            </td>
        </tr>
    </table>
    </form>
    <div class="pagin">
        <div class="message">共<i class="blue">{$total}</i>条记录，当前显示第&nbsp;<i class="blue">{$page}&nbsp;</i>页</div>
    </div>
    </div>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $("#checkall").on("click",function(){
            $("input[type='checkbox']").prop("checked",true);
        })
        $("#checkother").on("click",function(){
            $("input[type='checkbox']").each(function(){
                var prop = $(this).prop("checked");
                $(this).prop("checked",!prop);
            })
        })
        $("#dels").on("click",function(){
            var _this=$(this);
            layer.open({
                content:"确认要删除嘛?",
                skin:"layer-skin-molv",
                btn:["确认","取消"],
                yes:function(index,layero){
                     var chkvalue=[];
            $("input[name='ids[]']:checked").each(function(){ 
                chkvalue.push($(this).val()); 
            });
            $.ajax({
                'url':"{:url('/admin/ht/about/dels')}",
                'type' :"POST",
                'data' :{ids:chkvalue},
                'dataType' : 'json',
                success:function(msg){
                    if(msg.msg==1){
                         layer.confirm('删除成功', {icon:6,
                             btn: ['确定'] //按钮
                             }, function(){
                            $(location).attr('href',"/admin/ht/about/index");
                       });
                    }
                }
            })
                },
                btn2:function(index,layero){
                    layer.close();
                    window.location.href="{:url('/admin/ht/about/index')}";
                }
            })
          })
    });
    $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
</html>