<?php
namespace app\admin\controller\ht;
use think\Db;
use think\Url;
use think\Controller;
use think\Validate;
use think\Paginator;
header("Content-type: text/html; charset=utf-8");
class Download extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function index()		//下载中心列表显示
	{
		$title = $this->request->get("title");
		$sear['title'] = array('like','%'.$title.'%');
		$page = $this->request->param("page",1);
		$result = Db::name('download')->where($sear)->order('id desc')->paginate(6,false,["query"=>request()->param()]);
		$total=$result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
	 	$this->assign($data);
	 	return $this->fetch();
	}

	public function edit($id=0)		//编辑修改
	{
		$rows = Db::name("download")->where('id',$id)->find();
		$data["rows"]=$rows;
		$this->assign($data);
		return $this->fetch();
	}

	public function editsave($id=0)
	{
		$data = $this->request->post();
		$filename = "";
		$file = request()->file('file');
		if($file){
	        $info = $file->validate(['size'=>10*1024*1024])->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	        	$filename = $info->getSaveName();
	        	$filename = str_replace("\\", "/",$filename);
	        }else{
	            // 上传失败获取错误信息
	            echo $this->success($file->getError());
	        }
	    }
	    if($filename){
	    	$data["file"]=$filename;
	    }
	    $count = Db::table('download')->update($data);
	    if($count){
			$this->success("修改成功",url("/admin/ht/download/index"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/download/index';</script>";
            die();
		}
	}

	public function dels($id=0)		//删除
	{
		$id = $this->request->post("id");
		if($id){
			$res = Db::name("download")->where('id',$id)->delete();
			if($res){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
		}
	//批量删除
		$ids = $this->request->post('ids/a');		
		if($ids){
			$result = Db::name("download")->delete($ids);
			if($result){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
		}

	}

	public function add()	//下载中心添加
	{
		return $this->fetch();
	}

	public function addsave()	//下载中心添加存储
	{		
		$data = $this->request->post();
		$filename = "";
		$file = request()->file('file');
		if($file){
	        $info = $file->validate(['size'=>10*1024*1024])->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	        	$filename = $info->getSaveName();
	        	$filename = str_replace("\\", "/",$filename);
	        }else{
	            // 上传失败获取错误信息
	            echo $this->success($file->getError());
	        }
	    }
	    if($filename){
	    	$data["file"]=$filename;
	    }
		$data["addtime"] =time();
		$count = Db::name('download')->insert($data);
		if($count){
			$this->success("添加成功",url("/admin/ht/download/index"));
		}else{
			$this->success("添加失败",url("/admin/ht/download/add"));
		}
	}
}

?>
