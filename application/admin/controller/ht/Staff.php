<?php
namespace app\admin\controller\ht;
use think\Db;
use think\Url;
use think\Controller;
use think\Validate;
use think\Paginator;
header("Content-type: text/html; charset=utf-8");

class Staff extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function index()		//员工服务列表显示
	{
		$title = $this->request->get("title");
		$classId = $this->request->get("classId");
		$sear['title'] = array('like','%'.$title.'%');
		$sear['classId'] = array('like','%'.$classId.'%');
		$page = $this->request->param("page",1);
		$result = Db::name('staff')->where($sear)->order('id desc')->paginate(6,false,["query"=>request()->param()])->each(function($item){$item["sortname"]=Db::name("class")->where("id",$item['classId'])->value('sortname');
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

	public function edit($id=0)		//编辑修改
	{
		$rows = Db::name("staff")->where('id',$id)->find();
		$data["rows"]=$rows;
		$this->assign($data);
		return $this->fetch();
	}

	public function editsave($id=0)
	{
		$data = $this->request->post();
	    $count = Db::table('staff')->update($data);
	    if($count){
			$this->success("修改成功",url("/admin/ht/staff/index"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/staff/index';</script>";
            die();
		}
	}

	public function dels($id=0)		//删除
	{
		if($id){
			$res = Db::name("staff")->where('id',$id)->delete();
			if($res){
		      $this->success("删除成功",url("/admin/ht/staff/index"));
		    }
		    else{
		      $this->success("删除失败",url("/admin/ht/staff/index"));
		   }
		}
		//多选删除
		$ids = $this->request->post('ids/a');
		$result = Db::name("staff")->delete($ids);
		if($result){
			$datas=['msg'=>1];
			echo json_encode($datas);
		}

	}

	public function add()	//员工服务添加
	{
		$result = Db::name("class")->where('type','4')->select();
		$data['result'] = $result;
		$this->assign($data);
		return $this->fetch();
	}

	public function addsave()	//员工服务添加存储
	{		
		$data = $this->request->post();
		$data["addtime"] =time();
		$count = Db::name('staff')->insert($data);
		if($count){
			$this->success("添加成功",url("/admin/ht/staff/index"));
		}else{
			$this->success("添加失败",url("/admin/ht/staff/add"));
		}
	}

}
?>