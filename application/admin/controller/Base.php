<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/5
 * Time: 23:05
 */
namespace app\admin\controller;
use think\Controller;
class Base extends Controller{
    public function _initialize()
    {
        if (!session('username')){
            $this->error('请登录','Login/index');
        }
        parent::_initialize(); // TODO: Change the autogenerated stub
    }
}