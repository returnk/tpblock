<?php

namespace app\common\validate;

use think\Validate;

class AdminValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        // 后台登录
        'username|用户名' => 'require',
        'password|密码'  => 'require',
        'conpass|密码'   => 'require|confirm:password',
        // 后台注册
        'nickname|昵称'  => 'require',
        'email|邮箱'     => 'require|email',
    ];

    // 登录验证场景
    public function sceneLogin()
    {
        return $this->only(['username', 'password']);
    }

    // 注册场景
    public function sceneRegister()
    {
        // append 哪个表的字段是唯一
        return $this->only(['username', 'password', 'conpass', 'nickname', 'email'])->append('username', 'unique:admin');
    }

    public function sceneAdd()
    {
        return $this->only(['username', 'password', 'email']);
    }
}
