<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;
class Article extends Base
{
    public function index()
    {
        $id = input('id');
        $art = Db::name('article')->find($id);
        db('article')->where('id','=',$id)->setInc('click');
        //标题上面栏目名称
        $cn = db('cate')->find($art['cateid']);
        //频道推荐
        $tj = db('article')
            ->where(['cateid'=>$cn['id'],'state'=>1])
            ->limit(8)
            ->select();


        $key = $art['keywords'];
        $key = explode(',',$key);

        static $ls = [];
        foreach ($key as $k=>$v){

            $like = \db('article')
                ->field('id,title')
                ->where('keywords','like','%'.$v.'%')
                ->where('id','neq',$id)
                ->limit(8)
                ->select();
            $ls = array_merge($ls,$like);
        }
//        var_dump($ls);die;
        $this->assign('art',$art);
        $this->assign('cn',$cn);
        $this->assign('tj',$tj);
        $this->assign('ls',$ls);
        return $this->fetch('article');
    }
}
