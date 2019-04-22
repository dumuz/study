<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Staff extends Controller{

	public function _empty($name)
	{
		return $this->index($name);
	}

	public function index($name=77)		//员工服务首页
	{	
		$cla = Db::name('class')->where('type',4)->select();
		$data['cla'] = $cla;
		$new=Db::name('staff')->where('classId',$name)->order('id desc')->limit(5)->select();
		$data['classId'] = $name;
		$data['new'] = $new;		
		$this->assign($data);
		return $this->fetch('/staff/index');
	}

	public function detailed($id=0)	//员工服务详情页面
	{
		$cla = Db::name('class')->where('type',4)->select();
		$data['cla'] = $cla;
		Db::name('staff')->where('id',$id)->setInc('views');
		$new=Db::name('staff')->where('id',$id)->order('id desc')->find();
		$classId = $new['classId'];
		$data['new'] = $new;
		$data['classId'] = $classId;		
		$result1=Db::name('staff')->where("id", "<", $id)->order("id", "desc")->limit(1)->find();
		$this->assign('res1',$result1);
		$result2=Db::name('staff')->where("id", ">", $id)->order("id", "asc")->limit(1)->find();
		$this->assign('res2',$result2);
		$this->assign($data);
		return $this->fetch();
	}
	
}
?>