<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/4
 * Time: 13:31
 */
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate{
    protected $rule = [
        'username'=> 'require|max:25|unique:admin',
        'password'=> 'require'
    ];

    protected $message = [
      'username.require' => '名称不能为空',
      'username.max' => '名称最多不能超过25个字符',
      'password.require' => '密码不能为空',
    ];

    protected $scene = [
//        'add'=>['username'=>'require|max:25','password'],
        'add'=>['username'=>'require|max:30|unique:admin'],
        'edit'=>['username'=>'require'],
    ];
}