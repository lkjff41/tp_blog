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
//use app\admin\model\Link as LinkModel;
use app\admin\controller\Base;

class Tags extends Base{

    public function lis(){
        $list = db('tags')->paginate(3);
        $this->assign('list',$list);
        return $this->fetch('list');
    }

    public function add(){
        if (request()->isPost()){
            $data = [
                'tagname'=>input('tagname'),
            ];
            $validate = Loader::validate('tags');
            if (!$validate->check($data)){
                $this->error($validate->getError());die;
            }
            if (db('tags')->insert($data)){
                return $this->success('信息添加成功','lis');
            }else{
                return $this->error('添加失败');
            }
        }
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $data = db('tags')->find($id);
        if (request()->isPost()){
            $info = [
                'tagname'=>input('tagname'),
            ];
            $validate = Loader::validate('Tags');
            if (!$validate->check($info)){
                $this->error($validate->getError());die;
            }
            if (db('tags')->where('id',$id)->update($info)){
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
        if (db('tags')->delete($id)){
                $this->success('删除成功','lis');
        }else{
                $this->error('删除失败','lis');
        }

    }
}