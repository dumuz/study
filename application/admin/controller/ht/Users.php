<?php
namespace app\admin\controller\ht;
use think\Db;
use think\Url;
use think\Controller;
use think\Paginator;
use think\Validate;
use think\captcha\Captcha;
header("Content-type: text/html; charset=utf-8");

class Users extends Controller{

	public function _initialize()
	{
		islogin();
	}

	public function index()		//用户列表显示
	{
		$page = $this->request->param('page',1);
		$result = Db::name('users')->order('id desc')->paginate(9,false,["query"=>request()->param()]);
		$total = $result->total();
		$data["total"] = $total;
		$data["page"] = $page;
		$data["result"] = $result;
		$this->assign($data);
		return $this->fetch();
	}

	public function add()	//用户注册
	{
		return $this->fetch();
	}
	public function addsave()	//用户注册存储
	{
		$data = $this->request->post();
		$username = $this->request->param("username");
		$password = $this->request->param("password");
        $passwords=md5($password);
		$result = Db::name("users")->where('username',$username)->find();
		if($result){
            echo "<script>alert('该用户名已存在!');history.back();</script>";
            die();
        }
        $captcha =$this->request->post("code");
 	    if(!captcha_check($captcha)){
		   $this->success("验证码错误");
		};
        $data["addtime"] =time();
        $data['password'] = $passwords;
        $count = Db::name('users')->strict(false)->insert($data);
		if($count){
			$this->success("注册成功",url("/admin/ht/users/index"));
		}else{
			$this->success("注册失败",url("/admin/ht/users/add"));
		}
	}

	public function dels()		//删除
	{
		//多选删除
		$ids = $this->request->post('ids/a');
		$result = Db::name("users")->delete($ids);
		if($result){
			$datas=['msg'=>1];
			echo json_encode($datas);
		}
	}
	public function del()		//删除
	{
		$id = $this->request->post("id");
		if($id){
			$res = Db::name("users")->where('id',$id)->delete();
			if($res){
				$datas=['msg'=>1];
				echo json_encode($datas);
			}
		}
		
	}

	public function getcode(){
		$config=[
			// 验证码字体大小
			'fontSize'=>24,    
			// 验证码位数
			'length'=>4,   
			// 关闭验证码杂点
			'useNoise'=>true,
			//'useZh'=>true,
		];
		$captcha = new Captcha($config);
		return $captcha->entry();
	}

}
?>