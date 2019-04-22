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
    <li><a href="/admin/ht/recruit/indexo">首页</a></li>
    <li><a href="#">查询</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>    
    <div class="rightinfo">    
    <div class="tools">    
        <ul class="toolbar">
        <li>
        <form action="" method="get">
            <table border="1" bordercolor="#f00">
            <tr>
                <td>
                    <input type="text" name="title" style="border:2px solid #F0F0F0; height:30px;">
                    <input type="submit" value="搜索"style="border:2px solid #F0F0F0; height:30px; width:48px;">
                </td>
            </tr>
            </table>
        </form>
        </li>
        <a href="/admin/ht/recruit/addo"><li class="click"><span><img src="/images/images/t01.png" /></span>添加</li></a>
        </ul>                
        <ul class="toolbar1">
        <li><span><img src="/images/images/t05.png" /></span>设置</li>
        </ul>    
    </div>
    <form action="/admin/ht/recruit/dels" method="post"> 
    <table class="tablelist">
        <thead>
        <tr>
        <th width="100">选择</th>
        <th>编号<i class="sort"><img src="/images/images/px.gif" /></i></th> 
        <th>招聘岗位</th>
        <th>招聘部门</th>
        <th>学历要求</th>
        <th>预计薪资</th>
        <th>招聘人数</th>
        <th>添加时间</th>
        <th width="160">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {volist name="result" id="row"}
            <tr>
            <td><input type="checkbox" name="ids[]" value="{$row.id}"></td>
            <td>{$row.id}</td>
            <td>{$row.title}</td>
            <td>{$row.department}</td>
            <td>{$row.educational}</td>
            <td>{$row.salary}</td>
            <td>{$row.numbers}</td>
            <td>{:date("Y-m-d H:i:s",$row.addtime)}</td>
            <td>
                <a href="{:url('/admin/ht/recruit/edito',['id'=>$row.id])}" class="tablelink">编辑</a>&nbsp&nbsp
                <a href="javascript::" value="{$row.id}" class='del'>删除</a>
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
        });
        $(".del").click(function(){
            var _this=$(this);
            layer.open({
                content: "确认要删除嘛？",
                skin      : "layer-skin-molv",
                btn       : ["确认", "取消"],
                yes       : function(index,layero){
                    var id= _this.attr("value");
                    var data = {id:id};
                    $.ajax({
                'url':"{:url('/admin/ht/recruit/dels')}",
                'type' :"POST",
                'data' :data,
                'dataType' : 'json',
                success:function(msg){
                    if(msg.msg==1){
                         layer.confirm('删除成功', {icon:6,
                                     btn: ['确定'] //按钮
                                     }, function(){
                                    $(location).attr('href',"/admin/ht/recruit/indexo");
                           });
                    }
                }
            })
            },
        btn2:function(index,layero){
            layer.close();
                    window.location.href="{:url('/admin/ht/recruit/indexo')}";
                }
            });
        });
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
                'url':"{:url('/admin/ht/recruit/dels')}",
                'type' :"POST",
                'data' :{ids:chkvalue},
                'dataType' : 'json',
                success:function(msg){
                    if(msg.msg==1){
                         layer.confirm('删除成功', {icon:6,
                             btn: ['确定'] //按钮
                             }, function(){
                            $(location).attr('href',"/admin/ht/recruit/indexo");
                       });
                    }
                }
            })
                },
                btn2:function(index,layero){
                    layer.close();
                    window.location.href="{:url('/admin/ht/recruit/indexo')}";
                }
            })
          })
    });
    $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
</html>