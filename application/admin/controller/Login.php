<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 21:40
 */
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use app\admin\model\Link as LinkModel;
use app\admin\model\Admin;

class Login extends Controller{

    public function index(){
        if (request()->isPost()){
            $admin = new Admin();
            $data = input('post.');
            if ($admin->login($data)==3){
                $this->success('登录成功','index/index');
            }elseif ($admin->login($data)==4){
                $this->error('验证码错误');
            }else{
                $this->error('登录信息错误');
            }
        }
        return $this->fetch('login');
    }



}