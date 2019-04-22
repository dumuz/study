<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Paginator;

class Recruit extends Controller{

	public function index($id=0)		//招聘信息
	{
		$cla = Db::name('class')->where('type',5)->select();
		$data['cla'] = $cla;
		$zpxx=Db::name('recruit')->order('id desc')->paginate(5,false,['query' => request()->param()]);
		$total = $zpxx->total();
		$data["total"] = $total;
		$data['classId'] = $id;
		$data['zpxx'] = $zpxx;		
		$this->assign($data);
		return $this->fetch();
	}

	public function online($id=0)	//在线求职
	{	
		$cla = Db::name('class')->where('type',5)->select();
		$data['cla'] = $cla;
		$new=Db::name('online')->where('id',$id)->order('id desc')->paginate(5,false,['query' => request()->param()]);
		$total = $new->total();
		$data["total"] = $total;
		$data['classId'] = $id;
		$data['new'] = $new;		
		$this->assign($data);
		return $this->fetch();
	}

	public function addtsave($id=0)	//在线求职存储
	{	
		$data = $this->request->post();
		$data["addtime"] =time();
		$count = Db::name('online')->insert($data);
		if($count){
			$dat=['msg'=>1];
			echo json_encode($dat);
		}
	}

	public function jobs($id=0)		//求职招聘其他
	{
		$cla = Db::name('class')->where('type',5)->select();
		$data['cla'] = $cla;
		$new=Db::name('jobs')->where('classId',$id)->order('id desc')->paginate(5,false,['query' => request()->param()]);
		$total = $new->total();
		$data["total"] = $total;
		$data['classId'] = $id;
		$data['new'] = $new;		
		$this->assign($data);
		return $this->fetch();
	}

	public function shows($id=0)		//求职招聘其他详情
	{
		$cla = Db::name('class')->where('type',5)->select();
		$data['cla'] = $cla;
		$this->assign($data);
		return $this->fetch();
	}

}
?>