<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\Article as ArticleModel;
use app\index\controller\Base;
class Index extends Base
{
    public function index()
    {
//        $list = ArticleModel::paginate(2);
        $list = db('article')->order('click desc')->paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
    }
}