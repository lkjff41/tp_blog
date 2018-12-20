<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 21:40
 */
namespace app\admin\controller;
use think\Controller;
use think\File;
use think\Loader;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Base;

class Article extends Base{

    public function lis(){
        $list = ArticleModel::paginate(3);
//        $list = db('article')->alias('a')
//            ->join('cate b','b.id=a.cateid')
//            ->field('a.*,b.catename')->paginate(3);
        $this->assign('list',$list);
//        $this->assign('cate',$cate);
        return $this->fetch('list');
    }

    public function add(){
        $cate = db('cate')->select();
        if (request()->isPost()){
//            var_dump($_POST);die;
            $data = [
                'title' => input('title'),
                'author' => input('author'),
                'keywords' => str_replace('，',',',input('keywords')),
                'desc' => input('desc'),
                'cateid' => input('cateid'),
                'content'=>input('content'),
                'time'=>time(),
            ];
            if (input('state')=='on'){
                $data['state']=1;
            }
            if ($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH.'public'.DS.'static'.DS.'uploads');
                $data['pic'] = '/uploads/'.$info->getSaveName();
            }
            $validate = \think\Loader::validate('Article');
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());die;
            }
            if (db('article')->insert($data)){
                return $this->success('添加成功','lis');
            }else{
                return $this->error('添加失败');
            }

        }
        $this->assign('cate',$cate);
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $cate = db('cate')->select();
        $data = db('article')->find($id);
        if (request()->isPost()){
            $info = [
                'id'=>$id,
                'title' => input('title'),
                'author' => input('author'),
                'keywords' =>  str_replace('，',',',input('keywords')),
                'desc' => input('desc'),
                'cateid' => input('cateid'),
                'content'=>input('content'),
                'time'=>time(),
            ];
            if (input('state')=='on'){
                $info['state']=1;
            }else{
                $info['state']=0;
            }
            if ($_FILES['pic']['tmp_name']) {
//                @unlink(SITE_URL.'/public/static'.$data['pic']);
                $file = request()->file('pic');
                $pic = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads');
                $info['pic'] = '/uploads/'.$pic->getSaveName();
            }
            $validate = \think\Loader::validate('Article');
            if (!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());die;
            }
            if (db('article')->update($info)){
                $this->success('修改成功','lis');
            }else{
                $this->error('修改失败');
            }
        }
        $this->assign('data',$data);
        $this->assign('cate',$cate);
        return $this->fetch();
    }

    public function del(){
        $id = input('id');
            if (db('article')->delete($id)){
                $this->success('删除成功','lis');
            }else{
                $this->error('删除失败','lis');
            }
    }
}