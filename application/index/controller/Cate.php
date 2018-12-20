<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Article as ArticleModel;
use app\index\controller\Base;
class Cate extends Base
{
    public function index()
    {
        $cid = input('cateid');
        $list = db('article')->alias('a')
//            ->join('cate b','a.cateid=b.id')
            ->where('cateid','=',$cid)
            ->paginate(2);
        $cn = db('cate')->find($cid);
//        $list = ArticleModel::paginate(2);
        $this->assign('list',$list);
        $this->assign('cn',$cn);
        return $this->fetch('list');
    }
}