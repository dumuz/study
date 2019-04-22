<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {	
    	$data['rows'] = $this->getNews(66,3);
    	$data['hy'] = $this->getNews(67,3);
    	$zc=Db::name('news')->where('classId',68)->order('id desc')->limit(7)->select();
    	$data['zc']=$zc;
    	$zp=Db::name('recruit')->order('id desc')->limit(6)->select();
    	$data['zp']=$zp;
    	$qy=Db::name('company')->limit(1)->select();
	    $data['qy']=$qy;
    	$this->assign($data);
        return $this->fetch();
    }
    public function getNews($classId=0,$limit=3){
    	return Db::name('news')->where('classId',$classId)->order('id desc')->limit($limit)->select();
    }
}
