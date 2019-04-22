<?php
namespace app\index\controller;
use think\Controller;
class Baomin extends Controller
{
    public function index()
    {	
        return $this->fetch();
    }
}