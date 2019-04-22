<?php
namespace app\admin\controller\ht;
use think\Url;
use think\Paginator;
use think\Controller;
use think\Db;
use app\admin\model\Recruit as Mrecruit;
header("Content-type: text/html; charset=utf-8");

class Recruit extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function indexo()	//招聘信息列表显示
	{
		$title = $this->request->get("title");
		$sear['title'] = array('like','%'.$title.'%');
		$page = $this->request->param("page",1);
		$user = new Mrecruit($_POST);
		$result=$user->where($sear)->order('id desc')->paginate(6,false,['query' => request()->param()]);
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$this->assign($data);	
		return $this->fetch();
	}
	public function edito($id=0)	//招聘信息编辑
	{
		$a=new Mrecruit();
		$rows=$a->where('id',$id)->find();
		$data["rows"]=$rows;
		$this->assign($data);
		return $this->fetch();
	}
	public function editosave($id=0)	//招聘信息编辑存储
	{
		$a=new Mrecruit();
		$count=$a->allowField(true)->save($_POST,['id'=>$id]);
		if($count){
			$this->success("修改成功",url("/admin/ht/recruit/indexo"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/recruit/indexo';</script>";
            die();
		}
	}
	public function addo()	//招聘信息添加
	{
		return $this->fetch();
	}
	public function addosave()	//招聘信息添加存储
	{
		$data = $this->request->post();
		$data["addtime"] =time();
		$count = Db::name('recruit')->insert($data);
		if($count){
			$this->success("添加成功",url("/admin/ht/recruit/indexo"));
		}else{
			$this->success("添加失败",url("/admin/ht/recruit/indexo"));
		}
	}

	public function dels($id=0)
	{
		$id=$this->request->param('id');
		$a=new Mrecruit();
		if($id){
			$result=$a::destroy(['id' => $id]);
			if($result){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}		
		}
		$ids=$this->request->param('ids/a');
		if($ids){
			$count=$a::destroy($ids);		
			if($count){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
	    }	
	}

}
?>