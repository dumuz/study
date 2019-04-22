<?php
namespace app\admin\controller\ht;
use think\Url;
use think\Controller;
use think\Db;
use think\Session;
use think\Validate;
header("Content-type:text/html;charset=utf-8");
class Main extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function main()	//登入主页面
	{
		return $this->fetch();
	}

	public function top()	//登入主页面头部
	{
		return $this->fetch();
	}

	public function left()
	{
		return $this->fetch();	//登入主页面左边
	}

	public function indexframe()	//登入主页面右边
	{	
		$t = time();
        $row = Db::name('user')->where('addtime','<',$t)->where('username',Session('username'))->order('addtime desc')->limit(1,1)->select();
        $data["row"]=$row;
		$this->assign($data);
		return $this->fetch();
	}

}
?>