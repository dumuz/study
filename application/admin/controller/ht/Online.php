<?php
namespace app\admin\controller\ht;
use think\Url;
use think\Paginator;
use think\Controller;
use think\Db;
header("Content-type: text/html; charset=utf-8");

class Online extends Controller{

	public function _initialize()
	{
		islogin();
	}


	public function addt()	//在线求职添加
	{
		return $this->fetch();
	}
	public function addtsave()	//在线求职添加存储
	{
		$data = $this->request->post();
		$count = Db::name('online')->insert($data);
		if($count){
			$this->success("添加成功",url("/admin/ht/online/indext"));
		}else{
			$this->success("添加失败",url("/admin/ht/online/indext"));
		}
	}
	public function indext()	//在线求职列表显示
	{
		$page = $this->request->param("page",1);
		$result=Db::name('online')->order('id desc')->paginate(6,false,['query' => request()->param()]);
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$this->assign($data);	
		return $this->fetch();
	}
	public function editt($id=0)
	{
		$rows=Db::name('online')->where('id',$id)->find();
		$data["rows"]=$rows;
		$this->assign($data);
		return $this->fetch();
	}

	public function dels($id=0)
	{
		$id = $this->request->post("id");
		if($id){
			$res = Db::name("online")->where('id',$id)->delete();
			if($res){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
		}
	//批量删除
		$ids = $this->request->post('ids/a');		
		if($ids){
			$result = Db::name("online")->delete($ids);
			if($result){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
		}
	}

}
?>