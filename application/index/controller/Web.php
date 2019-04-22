<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Web extends Controller{

	// public function top()	//前端头部
	// {
	// 	return $this->fetch();
	// }

	public function bottom()	//前端底部
	{
		$result = Db::name('contacts')->limit(0,1)->find();
		$this->assign($result);
		return $this->fetch();
	}

}
?>