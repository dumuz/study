<?php
namespace app\admin\controller\ht;
use think\Controller;
use think\Url;
use think\Db;
use think\Paginator;
header("Content-type: text/html; charset=utf-8");
class Cla extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function index()	//类别列表显示
	{	
		$sortname = $this->request->get("sortname");
		$type = $this->request->get("type");
		dump($type);
		$sear['sortname'] = array('like','%'.$sortname.'%');
		$sear['type'] = array('like','%'.$type.'%');
		/*$where = [];
		$query = [];
		if($sortname){
			$where["sortname"] = ["like","%$sortname%"];
			$query["sortname"] = $sortname;
		}
		if($type){
			$where["type"] = ["like","%$type%"];
			$query["type"] = $type;
		}*/
		
		$page = $this->request->param("page",1);
		$result = Db::name('class')->where($sear)->order('id desc')->paginate(6,false,[
			"query"=>request()->param()
			]);
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$data["type"] = $type;
	 	$this->assign($data);
	 	return $this->fetch();
	}

	public function edit($id=0)	//编辑修改
	{
		$page = $this->request->param("page",1);
		$row = Db::name("class")->where("id",$id)->find();
		$data["row"] = $row;
		$data["page"] = $page;
		$this->assign($data);
		return $this->fetch();
	}
	public function editsave($id=0)	//编辑存储
	{
		$page = $this->request->param("page",1);
		$data = $this->request->post();
		$count = Db::table('class')->strict(false)->update($data);
		if($count){
			$this->success("修改成功",url("/admin/ht/cla/index?page=$page"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/cla/index';</script>";
            die();
		}
	}

	public function add()	//类别添加
	{
		return $this->fetch();
	}

	public function addsave()	//类别添加保存
	{
		$data = $this->request->post();
	    $count = Db::name("class")->insert($data);
	    if($count){
			$this->success("添加成功",url("/admin/ht/cla/index"));
		}else{
			$this->success("添加失败",url("/admin/ht/cla/add"));
		}
	}

	public function dels($id=0)	//类别删除
	{
		if($id){
			$res=Db::table('class')->where("id=$id")->delete();
			if($res){
		      $this->success("删除成功",url("/admin/ht/cla/index"));
		    }
		    else{
		      $this->success("删除失败",url("/admin/ht/cla/index"));
		   }
	    }
	   //批量删除
			$ids=$this->request->post("ids/a");
			$result=Db::name("class")->delete($ids);
			if($result){
				$datas=["msg"=>1];
				echo json_encode($datas);
			}
			
			/*if($result){
				$this->success("删除成功",url("/admin/ht/cla/index"));
			}
			else{
				$this->success("删除失败",url("/admin/ht/cla/index"));
			exit;
		}*/
	}

}
?>