<?php
/*
 * 管理员验证器
 */

namespace app\common\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username|用户名' => 'require',
        'password|密码' => 'require',
        'conpass|确认密码' => 'require|confirm:password',
        'email|邮箱' => 'require|email|unique:admin',
        'status|状态' => 'require',
        'super|权限' => 'require',
        'nickname|昵称' => 'require',
        'oldpass|原密码' => 'require',
        'newpass|新密码' => 'require',
        'code|验证码' => 'require'
    ];

    //登录验证场景
    public function sceneLogin()
    {
        return $this->only(['username','password']);
    }

    //注册验证场景
    public function sceneRegister()
    {
        return $this->only(['username', 'password', 'conpass', 'nickname','email'])
            ->append('username', 'unique:admin');
    }

    //重置密码验证场景
    public function sceneReset()
    {
        return $this->only(['code']);
    }

    //添加管理员验证场景
    public function sceneAdd()
    {
        return $this->only(['username','password','conpass','nickname','email'])->append('username','unique:admin');
    }

    //编辑管理员验证场景
    public function sceneEdit()
    {
        return $this->only(['oldpass','newpass','nickname']);
    }

}