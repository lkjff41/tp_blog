<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 12:39
 */
namespace app\admin\model;
use think\Model;

class Article extends Model{
    public function cate(){
        return $this->belongsTo('cate','cateid');
    }
}