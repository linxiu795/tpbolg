<?php


namespace app\common\validate;


use think\Validate;

class Cate extends Validate
{
    //初始化方法定义rule
    protected $rule = [
        'catename|栏目名称' => 'require|unique:cate',
        'sort|排序' => 'require|number'
    ];

    //验证添加场景
    public function sceneAdd()
    {
        return $this->only(['catename','sort']);
    }

    //验证排序场景
    public function sceneSort()
    {
        return $this->only(['sort']);
    }

    //验证编辑场景
    public function sceneEdit()
    {
        return $this->only(['catename']);
    }
}