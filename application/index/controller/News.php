<?php
namespace app\index\controller;
use think\Paginator;
use think\Controller;
use think\Db;
class News extends Controller{

	public function _empty($name)
    {
        return $this->index($name);
    }
	
	public function index($name=64)		//新闻资讯首页
	{
		$cla = Db::name('class')->where('type',2)->select();
		$data['cla'] = $cla;
		$new=Db::name('news')->where('classId',$name)->order('id desc')->paginate(5,false,['query' => request()->param()]);
		$total = $new->total();
		$data["total"] = $total;
		$data['classId'] = $name;
		$data['new'] = $new;		
		$this->assign($data);
		return $this->fetch("/news/index");
	}

	public function detailed($id=0)	//新闻资讯详情页面
	{
		$cla = Db::name('class')->where('type',2)->select();
		$data['cla'] = $cla;
		Db::name('news')->where('id',$id)->setInc('views');
		$new=Db::name('news')->where('id',$id)->order('id desc')->find();
		$classId = $new['classId'];
		$data['new'] = $new;
		$data['classId'] = $classId;		
		$result1=Db::name('news')->where("id", "<", $id)->order("id", "desc")->limit(1)->find();
		$this->assign('res1',$result1);
		$result2=Db::name('news')->where("id", ">", $id)->order("id", "asc")->limit(1)->find();
		$this->assign('res2',$result2);
		$this->assign($data);
		return $this->fetch();
	}


}
?>