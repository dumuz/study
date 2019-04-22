<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Download extends Controller{
	
	public function index($id=0)		//下载中心
	{
		$down = Db::name('download')->order("id desc")->limit(5)->select();
		$data['down'] = $down;
		$this->assign($data);
		return $this->fetch();
	}
	public function downcount(){
		$id=$this->request->param('id');
		if($id){
			$result=Db::name("download")->where("id",$id)->setInc("views");
			if($result)
			{
				$datas=['msg'=>1];
				echo json_encode($datas);
				exit;
			}
		}
		//return view("download/index");
		return $this->fetch("download/index");
	}

}
?>