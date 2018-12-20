<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;
class Search extends Base
{
    public function index(){
        if (request()->isGet()){
            $q = input('keywords');
            if ($q){
                $sou = db('article')
                    ->field('id,title,pic,time,keywords,desc')
                    ->where([
                        'title'=>['like',"%".$q."%"],
//                        'desc'=>['like',"%".$q."%"],
//                        'keywords'=>['like',"%".$q."%"],
                    ])->paginate($listRows = 8, $simple = false, $config = ['query'=>['keywords'=>$q]]);
                $this->assign(['sou'=>$sou,'keywords'=>$q]);
            }else{
                $this->assign('sou',null);
            }
        }

        return $this->fetch('search');
    }
}