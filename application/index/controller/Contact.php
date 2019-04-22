<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Contact extends Controller{
	
	public function index()		//联系我们
	{
		return $this->fetch();
	}

	public function message()		//在线留言
	{
		return $this->fetch();
	}

	public function addtsave($id=0)	//在线留言存储
	{	
		$data = $this->request->post();
		$count = Db::name('contacts')->insert($data);
		if($count){
			$dat=['msg'=>1];
			echo json_encode($dat);
		}
	}

}
?>