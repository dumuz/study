<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class About extends Controller
{
    public function index()		//关于我们
    {
        $data['gs'] = $this->getAbout(61,1);
        $this->assign($data);
        return $this->fetch();
    }

    public function culture()	//企业文化
    {
        $data['qywh'] = $this->getAbout(62,1);
        $this->assign($data);
    	return $this->fetch();
    }

    public function honor()		//荣誉资质
    {
        $ryzz = Db::name('about')->where('classId',63)->limit(3)->select();
        $data['ryzz'] = $ryzz;
        $this->assign($data);
    	return $this->fetch();
    }

    protected function getAbout($classId=0,$limit=0){
        return Db::name('about')->where('classId',$classId)->order('id desc')->limit($limit)->find();
    }
}
