<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate
{
    protected $rule=
    [
        'cate_name' => 'require',
    ];


    protected $message=
    [
        'cate_name.require' =>'不能为空！',
    ];

    protected $scene =
    [
        'editsong' =>
    ];

}