<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 15:18
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Index extends Base{
    public function index(){
        return $this->fetch();
}


}