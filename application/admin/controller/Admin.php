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
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Base;

class Admin extends Base{


    public function lis(){
        $list = AdminModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch('list');
    }

    public function add(){
        if (request()->isPost()){
            $data = [
                'username' => input('username'),
                'password' => md5(input('password')),
            ];
            $validate = \think\Loader::validate('Admin');
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());die;
            }
            if (db('admin')->insert($data)){
                return $this->success('添加成功','lis');
            }else{
                return $this->error('添加管理员失败');
            }

        }
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $data = db('admin')->find($id);
        if (request()->isPost()){
            $info = [
                'username'=>input('username'),
            ];
            if (input('password')){
                $info['password']=md5(input('password'));
                }else{
                $info['password']=$data['password'];
                }
            $validate = \think\Loader::validate('Admin');
            if (!$validate->scene('edit')->check($info)){
                $this->error($validate->getError());die;
            }
            $save = db('admin')->where('id',$id)->update($info);
            if ($save !==false){
                $this->success('修改成功','lis');
            }else{
                $this->errror('修改失败');
            }
        }
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function del(){
        $id = input('id');
        if ($id!=1){
            if (db('admin')->delete($id)){
                $this->success('删除成功','lis');
            }else{
                $this->error('删除失败','lis');
            }
        }else{
            $this->error('超级管理员不能删除');
        }

    }

    public function outlog(){
        session(null);
        $this->success('退出成功','Login/index','','0');
    }
}