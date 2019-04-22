<?php
namespace app\admin\controller\ht;
use think\Url;
use think\Controller;
use think\captcha\Captcha;
use think\Db;
use think\Session;
use think\Validate;
header("Content-type:text/html;charset=utf-8");
class Login extends Controller{

	
	public function log()		//登入
	{
		return $this->fetch('login');
	}

	public function logsave()	//登入存储信息
	{
		$captcha =$this->request->post("code");
 	    if(!captcha_check($captcha)){
		   $this->success("验证码错误");
		};
		$username = $this->request->param('username');
		$password = $this->request->param('password');
		$pwd = md5($password);
		$map=[];
		$map['username'] = $username;
		$map['password'] = $pwd;
		$row =Db::name("users")->where($map)->find();
		if($row){
			Session::set('username',$username);
			$data["addtime"] =time();
    		$data["username"]=$username;
    		Db::name("user")->order('id desc')->strict(false)->insert($data);	
    		$url =url('/admin/ht/main/main');
    		echo "<script>alert('登陆成功');location.href='$url';</script>";
		}else{
	    	echo "<script>alert('用户名或密码错误');history.back();</script>";
	    	die();
	    }
	}

	public function getcode(){
		$config=[
			// 验证码字体大小
			'fontSize'=>18,    
			// 验证码位数
			'length'=>4,   
			// 关闭验证码杂点
			'useNoise'=>true,
			'imageH'=>40,
			'imageW'=>140,
		];
		$captcha = new Captcha($config);
		return $captcha->entry();
	}	

}
?>