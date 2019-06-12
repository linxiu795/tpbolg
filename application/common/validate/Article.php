<?php


namespace app\common\validate;


use think\Validate;

class Article extends Validate
{
    //初始化验证规则
    protected $rule =[
        'title|文章标题' => 'require|unique:article',
        'tags|标签' =>'require',
        'cate_id|所属栏目' =>'require',
        'desc|文章概要'=>'require',
        'content|文章内容'=>'require',
        'is_top|推荐' =>'require'
    ];

    //验证添加场景
    public function sceneAdd(){
        return $this->only(['title','tags','cateid','desc','content']);
    }

    //验证推荐场景
    public function sceneTop()
    {
        return $this->only(['is_top']);
    }

    //验证编辑场景
    public function sceneEdit()
    {
        return $this->only(['title','tags','is_top','cate_id','desc','content']);
    }
}