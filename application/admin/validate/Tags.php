<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 13:31
 */
namespace app\admin\validate;
use think\Validate;
class Tags extends Validate{
    protected $rule = [
        'tagname'=> 'require|max:20|unique:tags',
    ];

    protected $message = [
      'tagname.require' => '标签不能为空',
      'tagname.max' => '标签最多不能超过20个字符',
    ];

//    protected $scene = [
////        'add'=>['username'=>'require|max:25','password'],
//        'add'=>['username','password'],
//        'edit'=>['username'=>'require'],
//    ];
}