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
use app\admin\controller\Base;

class Link extends Base{

    public function lis(){
        $list = LinkModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch('list');
    }

    public function add(){
        if (request()->isPost()){
            $data = [
                'title'=>input('title'),
                'url'=>input('url'),
                'desc'=>input('desc'),
            ];
            $validate = Loader::validate('Link');
            if (!$validate->check($data)){
                $this->error($validate->getError());die;
            }
            if (db('link')->insert($data)){
                return $this->success('信息添加成功','lis');
            }else{
                return $this->error('添加失败');
            }
        }
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $data = db('link')->find($id);
        if (request()->isPost()){
            $info = [
                'title'=>input('title'),
                'url'=>input('url'),
                'desc'=>input('desc'),
            ];
            $validate = Loader::validate('Link');
            if (!$validate->check($info)){
                $this->error($validate->getError());die;
            }
            if (db('link')->where('id',$id)->update($info)){
                return $this->success('信息修改成功','lis');
            }else{
                return $this->error('修改失败');
            }
         }
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function del(){
        $id = input('id');
        if (db('link')->delete($id)){
                $this->success('删除成功','lis');
        }else{
                $this->error('删除失败','lis');
        }

    }
}