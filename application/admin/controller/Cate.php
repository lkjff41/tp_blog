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
use app\admin\model\Cate as CateModel;
use app\admin\controller\Base;

class Cate extends Base{

    public function lis(){
        $list = CateModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch('list');
    }

    public function login(){
        return $this->fetch();
    }

    public function add(){
        if (request()->isPost()){
            $data = [
                'catename' => input('catename'),
            ];
            $validate = \think\Loader::validate('Cate');
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());die;
            }
            if (db('cate')->insert($data)){
                return $this->success('添加成功','lis');
            }else{
                return $this->error('添加管理员失败');
            }

        }
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $data = db('cate')->find($id);
        if (request()->isPost()){
            $info = [
                'catename'=>input('catename'),
            ];
            $validate = \think\Loader::validate('Cate');
            if (!$validate->scene('edit')->check($info)){
                $this->error($validate->getError());die;
            }
            $save = db('cate')->where('id',$id)->update($info);
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

            if (db('cate')->delete($id)){
                $this->success('删除成功','lis');
            }else{
                $this->error('删除失败','lis');
            }
    }
}