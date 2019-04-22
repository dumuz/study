<?php
use think\Hook;
use think\Db;
//获取类别ID
function lists($type){
  $result=Db::name('class')->where('type',$type)->select();
  return $result;
 }

//判断是否登入
function islogin()
	{
		if(!session('username')){
			$url = url("/admin/ht/login/log");
	        echo "<script>alert('对不起, 请先登录!');top.location.href='$url';
	        </script>";
	        exit();
		};
	}