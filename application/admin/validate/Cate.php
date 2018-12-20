<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 13:31
 */
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate{
    protected $rule = [
        'catename'=> 'require|max:30|unique:cate',

    ];

    protected $message = [
      'catename.require' => '名称不能为空',
      'catename.max' => '名称最多不能超过30个字符',
    ];

    protected $scene = [
////        'add'=>['username'=>'require|max:25','password'],
        'add'=>['catename'=>'require|max:30|unique:cate'],
        'edit'=>['catename'=>'require'],
    ];
}