<?php
namespace app\admin\controller\ht;
use think\Controller;
use think\Url;
use think\Db;
use think\Validate;
use think\Paginator;
header("Content-type: text/html; charset=utf-8");
class About extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function index()		//关于我们列表显示
	{
		$page = $this->request->param('page',1);
		$result = Db::name('about')->order('id desc')->paginate(3,false,["query"=>request()->param()])->each(function($item,$key){
			$item['sortname'] = Db::name("class")->where("id",$item['classId'])->value("sortname");
			return $item;
		});
		$total = $result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$this->assign($data);
		return $this->fetch();
	}

	public function edit($id=0)
	{	if($id){
			$rows = Db::name("about")->where('id',$id)->find();
			$data["rows"]=$rows;
			$this->assign($data);
			return $this->fetch();
		}	
	}
	public function editsave($id=0)
	{
		$data = $this->request->post();
		$filename = "";
		$file = request()->file('pic');
		if($file){
	        $info = $file->validate(['size'=>4*1024*1024,'ext'=>'jpg,jpeg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	        	$filename = $info->getSaveName();
	        	$filename = str_replace("\\", "/",$filename);
	        }else{
	            // 上传失败获取错误信息
	            echo $this->success($file->getError());
	        }
	    }
	    if($filename){
	    	$data["pic"]=$filename;
	    }
	    $count = Db::table('about')->update($data);
	    if($count){
			$this->success("修改成功",url("/admin/ht/about/index"));
		}else{
			echo "<script>alert('您还没有修改');location.href='/admin/ht/about/index';</script>";
            die();
		}

	}

	public function dels($id=0)		//关于我们删除
	{
		if($id){
			$filename = Db::name("about")->where('id',$id)->find();
			//file_exists(ROOT_PATH."/public/uploads/".$filename["pic"]);
			if($filename["pic"]){
				unlink(ROOT_PATH."/public/uploads/".$filename["pic"]);
			}
			$res = Db::name("about")->where('id',$id)->delete();
			if($res){
		      $this->success("删除成功",url("/admin/ht/about/index"));
		    }
		    else{
		      $this->success("删除失败",url("/admin/ht/about/index"));
		   }
		}
	//批量删除
		$ids = $this->request->post('ids/a');
		foreach($ids as $row){
			$filename = Db::name("about")->where('id',$row)->find();
			if($filename["pic"]){
				unlink(ROOT_PATH."/public/uploads/".$filename["pic"]);
			}
		}
		$result = Db::name("about")->delete($ids);
		if($result){
			$datas=['msg'=>1];
			echo json_encode($datas);
		}
	}

	public function add()	//关于我们添加
	{
		$result = Db::name("class")->where("type","1")->select();
		$data["result"]=$result;
		$this->assign($data);		
		return $this->fetch();
	}

	public function addsave()	//关于我们添加存储
	{
		$data = $this->request->post();
		$filename = "";
		$file = request()->file('pic');
		if($file){
	        $info = $file->validate(['size'=>4*1024*1024,'ext'=>'jpg,jpeg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	        	$filename = $info->getSaveName();
	        	$filename = str_replace("\\", "/",$filename);
	        }else{
	            // 上传失败获取错误信息
	            echo $this->success($file->getError());
	        }
	    }
	    $data["pic"]=$filename;
	    $count = Db::name("about")->insert($data);
	    if($count){
			$this->success("添加成功",url("/admin/ht/about/index"));
		}else{
			$this->success("添加失败",url("/admin/ht/about/add"));
		}
	}
}

?>