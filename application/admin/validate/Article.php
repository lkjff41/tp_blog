<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 13:31
 */
namespace app\admin\validate;
use think\Validate;
class Article extends Validate{
    protected $rule = [
        'title'=> 'require|max:60|unique:article',
        'cateid'=> 'require'
    ];

    protected $message = [
      'title.require' => '标题不能为空',
      'title.unique' => '标题已存在',
      'title.max' => '标题最多不能超过60个字符',
      'cateid.require' => '栏目未选择',
    ];

    protected $scene = [
//        'add'=>['username'=>'require|max:25','password'],
        'add'=>['title','cateid'],
        'edit'=>['title','cateid'],
    ];
}