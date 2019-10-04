<?php

namespace app\common\validate;

use think\Validate;

class MemberValidate extends Validate
{
    protected $rule = [
        'verify|验证码' => 'require|captcha',
        'username|用户名' => 'require|unique:member',
        'oldpass|原密码' => 'require',
        'password|密码' => 'require',
        'conpass|确认密码' => 'require|confirm:password',
        'email|邮箱' => 'require|email|unique:member',
    ];

    // 添加场景
    public function sceneAdd()
    {
        return $this->only(['username','password','email']);
    }
    // 修改场景
    public function sceneEdit()
    {
        return $this->only(['username','password','email','oldpass']);
    }
    // 注册场景
    public function sceneRegister()
    {
        return $this->only(['verify','username','password','conpass','email']);
    }
    // 登录场景
    public function sceneLogin()
    {
        // remove 移除用户唯一
        return $this->only(['verify','username','password'])->remove('username','unique');
    }

}
