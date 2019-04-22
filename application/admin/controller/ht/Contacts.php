<?php
namespace app\admin\controller\ht;
use think\Url;
use think\Paginator;
use think\Controller;
use think\Db;
use app\admin\model\Contacts as Mcontacts;
header("Content-type: text/html; charset=utf-8");

class Contacts extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function indexus()		//联系我们列表显示
	{
		$page = $this->request->param("page",1);
		$user = new Mcontacts($_POST);
		$result=$user->order('id desc')->paginate(6,false,['query' => request()->param()])->each(function($item,$key){$item->sortname=Db::name('class')->where("id",$item['classId'])->value('sortname');
		});
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$this->assign($data);	
		return $this->fetch();
	}

	public function index()		//在线留言列表显示
	{
		$page = $this->request->param("page",1);
		$user = new Mcontacts($_POST);
		$result=$user->order('id desc')->paginate(6,false,['query' => request()->param()])->each(function($item,$key){$item->sortname=Db::name('class')->
			where('id',$item['classId'])->value('sortname');
		});
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$this->assign($data);	
		return $this->fetch();
	}

	public function edit($id=0) //关于我们编辑修改
	{
		$page = $this->request->param("page",1);
		$a=new Mcontacts();
		$rows=$a->where('id',$id)->find();
		$data["page"]=$page;
		$data["rows"]=$rows;
		$this->assign($data);
		return $this->fetch();
	}
	public function editsave($id=0)		//关于我们编辑修改存储
	{
		$page = $this->request->param("page",1);
		$a=new Mcontacts();
		$data["page"] = $page;
		$id=$this->request->param('id');
		$data["classId"]=$this->request->param('classId');
		$data["tel"]=$this->request->param('tel');
		$data["qq"]=$this->request->param('qq');
		$data["email"]=$this->request->param('email');
		$data["ip"]=$this->request->param('ip');
		$count=$a->allowField(true)->save($data,['id'=>$id]);
		if($count){
			$this->success("修改成功",url("/admin/ht/contacts/indexus?page=$page"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/contacts/indexus';</script>";
            die();
		}
	}

	public function dels($id=0)
	{
		$id=$this->request->param('id');
		$a=new Mcontacts();
		if($id){
			$result=$a::destroy(['id' => $id]);
			if($result){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}		
		}
		$ids=$this->request->param('ids/a');	//多选删除
		if($ids){
			$count=$a::destroy($ids);		
			if($count){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
	    }	
	}

	public function addus()	//联系我们添加
	{
		return $this->fetch();
	}
	public function addsaveus()	//联系我们添加存储
	{
		$user = new Mcontacts($_POST);
		$count=$user->allowField(true)->save();
		if($count){
			$this->success("添加成功",url("/admin/ht/contacts/indexus"));
		}else{
			$this->success("添加失败",url("/admin/ht/contacts/addus"));
		}

	}
	public function add()	//在线留言添加
	{
		return $this->fetch();
	}
	public function addsave()	//在线留言添加存储
	{
		$user = new Mcontacts($_POST);
		$count=$user->allowField(true)->save();
		if($count){
			$this->success("添加成功",url("/admin/ht/contacts/index"));
		}else{
			$this->success("添加失败",url("/admin/ht/contacts/add"));
		}

	}

}
?>