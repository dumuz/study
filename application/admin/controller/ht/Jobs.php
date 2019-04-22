<?php
namespace app\admin\controller\ht;
use think\Url;
use think\Paginator;
use think\Controller;
use think\Db;
header("Content-type: text/html; charset=utf-8");

class Jobs extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function add()	//添加
	{
		return $this->fetch();
	}
	public function addsave()
	{
		$data = $this->request->post();
		$data["addtime"] =time();
		$count = Db::name('jobs')->insert($data);
		if($count){
			$this->success("添加成功",url("/admin/ht/jobs/index"));
		}else{
			$this->success("添加失败",url("/admin/ht/jobs/index"));
		}
	}
	public function index($id=0)		//列表显示
	{
		$title = $this->request->get("title");
		$classId = $this->request->get("classId");
		$sear['title'] = array('like','%'.$title.'%');
		$sear['classId'] = array('like','%'.$classId.'%');
		$page = $this->request->param("page",1);
		$result=Db::name('jobs')->where($sear)->order('id desc')->paginate(6,false,['query' => request()->param()])->each(function($item){
			$item['sortname'] = Db::name("class")->where("id",$item['classId'])->value("sortname");
			return $item;			
		});
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$data["classId"] = $classId;
		$this->assign($data);	
		return $this->fetch();
	}
	public function edit($id=0)		//编辑
	{
		$page = $this->request->param("page",1);
		$rows=Db::name('jobs')->where('id',$id)->find();
		$data["page"]=$page;
		$data["rows"]=$rows;
		$this->assign($data);
		return $this->fetch();
	}
	public function editsave($id=0)		//编辑存储
	{
		$page = $this->request->param("page",1);		
		$data = $this->request->post();
	    $count = Db::table('jobs')->strict(false)->update($data);
		if($count){
			$this->success("修改成功",url("/admin/ht/jobs/index?page=$page"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/jobs/index';</script>";
            die();
		}
	}

	public function dels($id=0)		//关于我们删除
	{
		$id = $this->request->post("id");
		if($id){
			$res = Db::name("jobs")->where('id',$id)->delete();
			if($res){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
		}
	//批量删除
		$ids = $this->request->post('ids/a');		
		if($ids){
			$result = Db::name("jobs")->delete($ids);
			if($result){$datas=['msg'=>1];
			echo json_encode($datas);
			}
		}
	}

}
?>