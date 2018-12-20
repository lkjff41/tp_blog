<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 13:31
 */
namespace app\admin\validate;
use think\Validate;
class Link extends Validate{
    protected $rule = [
        'title'=> 'require|max:30',
        'url'=> 'require|max:60',
        'desc'=> 'max:255',
    ];

    protected $message = [
      'title.require' => '标题不能为空',
      'url.require' => 'url不能为空',
      'title.max' => '标题最多不能超过30个字符',
      'url.max' => 'url最多不能超过60个字符',
      'desc.max' => '说明最多不能超过255个字符',
    ];

//    protected $scene = [
////        'add'=>['username'=>'require|max:25','password'],
//        'add'=>['username','password'],
//        'edit'=>['username'=>'require'],
//    ];
}