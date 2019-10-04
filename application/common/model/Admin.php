<?php

namespace app\common\model;

use app\common\validate\AdminValidate;
use think\Model;
use think\model\concern\SoftDelete;
use think\Validate;


class Admin extends Model
{
//    protected $table = 'tp_admin';
    // 软删除
    use SoftDelete;
    // 只读字段
    protected $readonly = ['email'];
    // 登录校验
    public function login($data)
    {
        $validate = new AdminValidate();
//        if(!$validate->sceneLogin()->check($data)) {
        if(!$validate->scene('login')->check($data)) {
            return $validate->getError();
        }
        $res = $this->where($data)->find();

        if($res) {
            // 判断用户状态
            if($res['status'] != 1) {
                return '此账户被禁用';
            }
            // 用户数据存到session
            $sessionData = [
                'id' => $res['id'],
                'username' => $res['username'],
                'is_super' => $res['is_super']
            ];
            session('admin',$sessionData);
            // 1 用户存在 账号密码正确
            return 1;
        } else {
            return '用户名或密码错误';
        }
    }
    // 注册校验
    public function register($data)
    {
        $validate = new AdminValidate();
        if(!$validate->scene('register')->check($data)) {
            return $validate->getError();
        }

        // 插入数据库
        $res = $this->allowField(true)->save($data);
        if($res) {
            // 注册成功给邮箱发邮件
            mail($data['email'],'eshuo注册成功','来自eshuo网站的提醒');
            return 1;
        } else {
            return $this->error('注册失败');
        }
    }
    // 添加
    public function add($data)
    {
        $validate = new AdminValidate();
        if(!$validate->scene('add')->check($data)) {
            return $validate->getError();
        }
        // 插入数据
        $res = $this->allowField(true)->save($data);
        if($res) {
            return 1;
        } else {
            return '会员添加失败';
        }
    }
    // 修改
    public function edit($data)
    {
        $validate = new MemberValidate();
        if(!$validate->sceneEdit()->check($data)) {
            return $validate->getError();
        }
        // 修改数据
        $memInfo = model('member')->find($data['id']);
        if($data['oldpass'] != $memInfo['password']) {
            return '原密码不正确';
        }
        $memInfo['username'] = $data['username'];
        $memInfo['password'] = $data['password'];
        $memInfo['email'] = $data['email'];
        $res = $memInfo->save();
        if($res) {
            return 1;
        } else {
            return '添加失败';
        }
    }
}
