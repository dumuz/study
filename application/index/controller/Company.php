<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Company extends Controller{

	public function _empty($name)
    {
        return $this->index($name);
    }
	
	public function index($name=70)		//企业服务
	{
		$cla = Db::name('class')->where('type',3)->select();
		$data['cla'] = $cla;
		Db::name('company')->where('classId',$name)->setInc('views');
		$comp=Db::name('company')->where('classId',$name)->order('id desc')->find();
		$data['classId']=$name;
		$data['comp']=$comp;
		$this->assign($data);
		return $this->fetch('/company/index');
	}

}
?>